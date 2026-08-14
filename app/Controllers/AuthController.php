<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\MemberRepository;
use App\Repositories\UserSessionRepository;
use App\Services\Account\AchievementService;
use App\Services\Account\AuthService;
use App\Services\Notifications\AdminNotificationMailer;
use App\Services\Notifications\MemberActivationMailer;
use App\Services\Notifications\PasswordResetMailer;

/**
 * Gère les écrans et actions d'authentification.
 */
class AuthController extends Controller
{
    /**
     * Affiche le formulaire de connexion.
     */
    public function showLogin(): void
    {
        $this->view('auth/login', [
            'title' => 'EscapeRPG - Connexion',
        ]);
    }

    /**
     * Tente de connecter un membre à partir du formulaire.
     */
    public function login(): void
    {
        if (!verify_csrf($this->request->post('_token'))) {
            $this->session->flash('error', 'Session invalide, veuillez réessayer.');
            $this->response->redirect('/login');
        }

        $username = trim((string) $this->request->post('pseudocompte'));
        $password = (string) $this->request->post('pass');
        $remember = $this->request->post('autolog') !== null;

        if ($username === '' || $password === '') {
            $this->session->flash('error', 'Pseudo et mot de passe sont requis.');
            $this->response->redirect('/login');
        }

        if (!AuthService::attempt($username, $password, $remember)) {
            $this->session->flash('error', 'Une erreur s\'est produite. Veuillez réessayer.');
            $this->response->redirect('/login');
        }

        $this->session->flash('success', 'Connexion réussie.');
        $this->response->redirect('/mon-compte');
    }

    /**
     * Affiche le formulaire d'inscription.
     */
    public function showRegister(): void
    {
        $this->view('auth/register', [
            'title' => 'EscapeRPG - Inscription',
        ]);
    }

    /**
     * Crée un nouveau compte membre.
     */
    public function register(): void
    {
        if (!verify_csrf($this->request->post('_token'))) {
            $this->session->flash('error', 'Session invalide, veuillez réessayer.');
            $this->response->redirect('/register');
        }

        if (trim((string) $this->request->post('website')) !== '') {
            $this->session->flash('success', 'Un email d’activation vient de vous être envoyé.');
            $this->response->redirect('/login');
        }

        $username = mb_strtolower(trim((string) $this->request->post('pseudocompte')));
        $email = trim((string) $this->request->post('email'));
        $password = (string) $this->request->post('pass1');
        $passwordConfirmation = (string) $this->request->post('pass2');

        $errors = $this->validateRegistration($username, $email, $password, $passwordConfirmation);
        if ($errors !== []) {
            $this->session->flash('error', implode(' ', $errors));
            $this->response->redirect('/register');
        }

        $members = new MemberRepository($this->db);
        $members->deleteExpiredPending($username, $email);

        if ($members->findByUsername($username)) {
            $this->session->flash('error', 'Cet utilisateur existe déjà.');
            $this->response->redirect('/register');
        }

        if ($members->findByEmail($email)) {
            $this->session->flash('error', 'Cette adresse email est déjà utilisée.');
            $this->response->redirect('/register');
        }

        $avatar = $this->handleAvatarUpload();
        $activationToken = bin2hex(random_bytes(32));
        $members->createPending(
            $username,
            $email,
            password_hash($password, PASSWORD_DEFAULT),
            $avatar,
            hash('sha256', $activationToken),
        );
        (new MemberActivationMailer())->send($email, $username, $activationToken);

        $this->session->flash('success', 'Votre compte a été créé. Consultez votre email pour l’activer.');
        $this->response->redirect('/login');
    }

    /**
     * Affiche la confirmation d'activation sans consommer le lien.
     */
    public function showActivation(string $token): void
    {
        $member = $this->pendingMemberFromToken($token);
        if (!$member) {
            $this->session->flash('error', 'Ce lien d’activation est invalide ou a expiré.');
            $this->response->redirect('/login');
        }

        $this->view('auth/activate', [
            'title' => 'EscapeRPG - Activation du compte',
            'member' => $member,
            'activationToken' => $token,
        ]);
    }

    /**
     * Active un compte après confirmation protégée par CSRF.
     */
    public function activate(string $token): void
    {
        if (!verify_csrf($this->request->post('_token'))) {
            $this->session->flash('error', 'Session invalide, veuillez réessayer.');
            $this->response->redirect('/activate-account/' . rawurlencode($token));
        }

        $member = $this->pendingMemberFromToken($token);
        if (!$member) {
            $this->session->flash('error', 'Ce lien d’activation est invalide ou a expiré.');
            $this->response->redirect('/login');
        }

        $members = new MemberRepository($this->db);
        $members->activate((int) $member['id']);
        $member = $members->findByUsername((string) $member['pseudo']);

        if ($member) {
            AuthService::login($member);
            (new AchievementService())->grant('general', 'inscription', $member);
            (new AdminNotificationMailer())->notifyNewMember((string) $member['pseudo']);
        }

        $this->session->flash('success', 'Votre adresse email est confirmée et votre compte est actif.');
        $this->response->redirect('/mon-compte');
    }

    /**
     * Affiche le formulaire de demande de réinitialisation.
     */
    public function showForgotPassword(): void
    {
        $this->view('auth/forgot_password', [
            'title' => 'EscapeRPG - Mot de passe oublié',
        ]);
    }

    /**
     * Envoie un lien de réinitialisation sans révéler l'existence du compte.
     */
    public function requestPasswordReset(): void
    {
        if (!verify_csrf($this->request->post('_token'))) {
            $this->session->flash('error', 'Session invalide, veuillez réessayer.');
            $this->response->redirect('/forgot-password');
        }

        if (trim((string) $this->request->post('website')) === '') {
            $email = trim((string) $this->request->post('email'));
            $members = new MemberRepository($this->db);
            $member = filter_var($email, FILTER_VALIDATE_EMAIL) ? $members->findByEmail($email) : null;

            if ($member && !empty($member['email_verified_at'])) {
                $resetToken = bin2hex(random_bytes(32));
                $members->setPasswordResetToken((int) $member['id'], hash('sha256', $resetToken));
                (new PasswordResetMailer())->send((string) $member['email'], (string) $member['pseudo'], $resetToken);
            }
        }

        $this->session->flash(
            'success',
            'Si cette adresse correspond à un compte actif, un email de réinitialisation vient d’être envoyé.'
        );
        $this->response->redirect('/forgot-password');
    }

    /**
     * Affiche le formulaire permettant de choisir un nouveau mot de passe.
     */
    public function showResetPassword(string $token): void
    {
        if (!$this->memberFromPasswordResetToken($token)) {
            $this->session->flash('error', 'Ce lien de réinitialisation est invalide ou a expiré.');
            $this->response->redirect('/forgot-password');
        }

        $this->view('auth/reset_password', [
            'title' => 'EscapeRPG - Nouveau mot de passe',
            'resetToken' => $token,
        ]);
    }

    /**
     * Enregistre le nouveau mot de passe après validation du jeton et du CSRF.
     */
    public function resetPassword(string $token): void
    {
        if (!verify_csrf($this->request->post('_token'))) {
            $this->session->flash('error', 'Session invalide, veuillez réessayer.');
            $this->response->redirect('/reset-password/' . rawurlencode($token));
        }

        $member = $this->memberFromPasswordResetToken($token);
        if (!$member) {
            $this->session->flash('error', 'Ce lien de réinitialisation est invalide ou a expiré.');
            $this->response->redirect('/forgot-password');
        }

        $password = (string) $this->request->post('pass1');
        $confirmation = (string) $this->request->post('pass2');
        if (strlen($password) < 8 || $password !== $confirmation) {
            $message = strlen($password) < 8
                ? 'Le nouveau mot de passe doit contenir au moins 8 caractères.'
                : 'Les deux mots de passe sont différents.';
            $this->session->flash('error', $message);
            $this->response->redirect('/reset-password/' . rawurlencode($token));
        }

        (new MemberRepository($this->db))->resetPassword((int) $member['id'], password_hash($password, PASSWORD_DEFAULT));
        (new UserSessionRepository($this->db))->deleteByUserPseudo((string) $member['pseudo']);
        AuthService::logout();

        $this->session->flash('success', 'Votre mot de passe a été modifié. Vous pouvez maintenant vous connecter.');
        $this->response->redirect('/login');
    }

    /**
     * Déconnecte le membre courant.
     */
    public function logout(): void
    {
        if (!verify_csrf($this->request->post('_token'))) {
            $this->response->redirect('/login');
        }

        AuthService::logout();
        $this->session->flash('success', 'Vous êtes déconnecté.');
        $this->response->redirect('/login');
    }

    /**
     * Valide les données principales du formulaire d'inscription.
     *
     * @return string[]
     */
    private function validateRegistration(string $username, string $email, string $password, string $passwordConfirmation): array
    {
        $errors = [];

        if ($username === '' || mb_strlen($username) > 20) {
            $errors[] = 'Le pseudo est requis et doit faire 20 caractères maximum.';
        }

        if (!preg_match('/^[a-z0-9 _.-]+$/i', $username)) {
            $errors[] = 'Le pseudo contient des caractères non autorisés.';
        }

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'Adresse email invalide.';
        }

        if (strlen($password) < 8) {
            $errors[] = 'Le mot de passe doit contenir au moins 8 caractères.';
        }

        if ($password !== $passwordConfirmation) {
            $errors[] = 'Les deux mots de passe sont différents.';
        }

        return $errors;
    }

    /**
     * Retourne le membre correspondant à un jeton d'activation bien formé.
     */
    private function pendingMemberFromToken(string $token): ?array
    {
        if (strlen($token) !== 64 || !ctype_xdigit($token)) {
            return null;
        }

        return (new MemberRepository($this->db))->findPendingByActivationToken(hash('sha256', $token));
    }

    /**
     * Retourne le membre correspondant à un jeton de réinitialisation bien formé.
     */
    private function memberFromPasswordResetToken(string $token): ?array
    {
        if (strlen($token) !== 64 || !ctype_xdigit($token)) {
            return null;
        }

        return (new MemberRepository($this->db))->findByValidPasswordResetToken(hash('sha256', $token));
    }

    /**
     * Traite l'upload de l'avatar d'inscription et retourne son nom de fichier.
     */
    private function handleAvatarUpload(): string
    {
        $file = $this->request->file('avatar');
        if (!is_array($file) || ($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            return 'default.png';
        }

        if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
            $this->session->flash('error', 'Erreur lors de l\'upload de l\'avatar.');
            $this->response->redirect('/register');
        }

        $extension = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png'];
        if (!in_array($extension, $allowed, true)) {
            $this->session->flash('error', 'Extension invalide. Seules les images .jpg et .png sont autorisées.');
            $this->response->redirect('/register');
        }

        if (($file['size'] ?? 0) > 4 * 1024 * 1024) {
            $this->session->flash('error', 'Fichier trop volumineux. Taille maximale : 4 Mo.');
            $this->response->redirect('/register');
        }

        $uploadDir = BASE_PATH . '/public/assets/img/uploads';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        $filename = uniqid('', true) . '.' . $extension;
        $target = $uploadDir . '/' . $filename;
        if (!move_uploaded_file($file['tmp_name'], $target)) {
            $this->session->flash('error', 'Impossible d\'enregistrer l\'avatar.');
            $this->response->redirect('/register');
        }

        return $filename;
    }
}

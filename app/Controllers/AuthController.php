<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\MemberRepository;
use App\Services\AchievementService;
use App\Services\AuthService;

class AuthController extends Controller
{
    public function showLogin(): void
    {
        $this->view('auth/login', [
            'title' => 'EscapeRPG - Connexion',
        ]);
    }

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

    public function showRegister(): void
    {
        $this->view('auth/register', [
            'title' => 'EscapeRPG - Inscription',
        ]);
    }

    public function register(): void
    {
        if (!verify_csrf($this->request->post('_token'))) {
            $this->session->flash('error', 'Session invalide, veuillez réessayer.');
            $this->response->redirect('/register');
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
        if ($members->findByUsername($username)) {
            $this->session->flash('error', 'Cet utilisateur existe déjà.');
            $this->response->redirect('/register');
        }

        if ($members->findByEmail($email)) {
            $this->session->flash('error', 'Cette adresse email est déjà utilisée.');
            $this->response->redirect('/register');
        }

        $avatar = $this->handleAvatarUpload();
        $members->create($username, $email, password_hash($password, PASSWORD_DEFAULT), $avatar);

        $member = $members->findByUsername($username);
        if ($member) {
            AuthService::login($member);
            (new AchievementService())->grant('general', 'inscription', $member);
        }

        $this->session->flash('success', 'Votre compte a bien été créé.');
        $this->response->redirect('/mon-compte');
    }

    public function logout(): void
    {
        if (!verify_csrf($this->request->post('_token'))) {
            $this->response->redirect('/login');
        }

        AuthService::logout();
        $this->session->flash('success', 'Vous êtes déconnecté.');
        $this->response->redirect('/login');
    }

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

    private function handleAvatarUpload(): string
    {
        $file = $this->request->file('avatar');
        if (!is_array($file) || ($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            return 'narrateur.png';
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

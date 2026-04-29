<?php

namespace App\Controllers;

use App\Core\Controller;
use App\Repositories\AchievementRepository;
use App\Repositories\FriendRepository;
use App\Repositories\MemberRepository;
use App\Services\Account\AchievementService;
use App\Services\Account\AuthService;

/**
 * Gère les profils membres et les relations d'amitié.
 */
class MemberController extends Controller
{
    /**
     * Redirige la recherche d'un pseudo vers son URL de profil.
     */
    public function search(): void
    {
        $pseudo = trim((string) $this->request->query('pseudo', ''));
        if ($pseudo === '') {
            $this->response->redirect('/');
        }

        $this->response->redirect('/membres/' . rawurlencode($pseudo));
    }

    /**
     * Affiche le profil du membre connecté.
     */
    public function showCurrent(): void
    {
        $member = AuthService::user();
        if (!$member) {
            $this->response->redirect('/login');
        }

        $this->renderMemberProfile($member, true);
    }

    /**
     * Affiche le profil public d'un membre.
     */
    public function show(string $pseudo): void
    {
        $members = new MemberRepository($this->db);
        $member = $members->findByUsername($pseudo);
        if (!$member) {
            http_response_code(404);
            exit('404');
        }

        $this->renderMemberProfile($member, AuthService::pseudo() === $member['pseudo']);
    }

    /**
     * Affiche le formulaire d'édition du profil courant.
     */
    public function edit(): void
    {
        $member = AuthService::user();
        if (!$member) {
            $this->response->redirect('/login');
        }

        $this->view('members/edit', [
            'title' => 'EscapeRPG - Édition de profil',
            'member' => $member,
        ]);
    }

    /**
     * Met à jour les informations du profil courant.
     */
    public function update(): void
    {
        if (!verify_csrf($this->request->post('_token'))) {
            $this->session->flash('error', 'Session invalide, veuillez réessayer.');
            $this->response->redirect('/profil/edit');
        }

        $member = AuthService::user();
        if (!$member) {
            $this->response->redirect('/login');
        }

        $email = trim((string) $this->request->post('email'));
        $currentPassword = (string) $this->request->post('pass1');
        $newPassword = (string) $this->request->post('pass2');
        $confirmPassword = (string) $this->request->post('pass3');

        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $this->session->flash('error', 'Adresse email invalide.');
            $this->response->redirect('/profil/edit');
        }

        $members = new MemberRepository($this->db);
        $existingByEmail = $members->findByEmail($email);
        if ($existingByEmail && $existingByEmail['id'] !== $member['id']) {
            $this->session->flash('error', 'Cette adresse email est déjà utilisée.');
            $this->response->redirect('/profil/edit');
        }

        $passwordHash = null;
        if ($newPassword !== '' || $confirmPassword !== '') {
            if ($newPassword !== $confirmPassword) {
                $this->session->flash('error', 'Les nouveaux mots de passe ne correspondent pas.');
                $this->response->redirect('/profil/edit');
            }

            if (strlen($newPassword) < 8) {
                $this->session->flash('error', 'Le nouveau mot de passe doit contenir au moins 8 caractères.');
                $this->response->redirect('/profil/edit');
            }

            $currentHash = $member['password'] ?? '';
            $valid = password_verify($currentPassword, $currentHash) || md5($currentPassword) === $currentHash;
            if (!$valid) {
                $this->session->flash('error', 'Le mot de passe actuel est incorrect.');
                $this->response->redirect('/profil/edit');
            }

            $passwordHash = password_hash($newPassword, PASSWORD_DEFAULT);
        }

        $avatar = $this->handleAvatarUpload($member['avatar'] ?? null);
        $members->updateProfile($member['pseudo'], $email, $passwordHash, $avatar);

        $updated = $members->findByUsername($member['pseudo']);
        if ($updated) {
            AuthService::login($updated);
        }

        $this->session->flash('success', 'Votre profil a bien été mis à jour.');
        $this->response->redirect('/mon-compte');
    }

    /**
     * Ajoute un membre à la liste d'amis du membre connecté.
     */
    public function addFriend(string $pseudo): void
    {
        $members = new MemberRepository($this->db);
        $target = $members->findByUsername($pseudo);

        if (!$target) {
            http_response_code(404);
            exit('404');
        }

        if (!verify_csrf($this->request->post('_token'))) {
            $this->session->flash('error', 'Session invalide, veuillez réessayer.');
            $this->response->redirect('/membres/' . rawurlencode($target['pseudo']));
        }

        $current = AuthService::user();
        if (!$current) {
            $this->response->redirect('/login');
        }

        if (($target['pseudo'] ?? '') === 'le narrateur') {
            $this->session->flash('error', 'Le Narrateur ne peut pas être ajouté comme partenaire d\'aventure.');
            $this->response->redirect('/membres/' . rawurlencode($pseudo));
        }

        if (($current['pseudo'] ?? null) === ($target['pseudo'] ?? null)) {
            $this->session->flash('error', 'Vous ne pouvez pas vous ajouter vous-même.');
            $this->response->redirect('/membres/' . rawurlencode($pseudo));
        }

        $friends = new FriendRepository($this->db);
        if (!$friends->exists($current['id'], $target['id'])) {
            $friends->add($current['id'], $target['id']);
            $achievementService = new AchievementService();
            $achievementService->grant('general', 'amis', $current);
            $this->session->flash('success', 'Partenaire d\'aventure ajouté.');
        }

        $this->response->redirect('/membres/' . rawurlencode($pseudo));
    }

    /**
     * Prépare toutes les données nécessaires à l'affichage d'un profil.
     */
    private function renderMemberProfile(array $member, bool $isOwner): void
    {
        $friends = new FriendRepository($this->db);
        $achievements = new AchievementRepository($this->db);
        $friendList = isset($member['pseudo']) ? $friends->getFriendsForMember($member['id']) : [];

        $scenarioTotals = [
            'general' => 14,
            'lastparty' => 5,
            'secretsfamiliaux' => 16,
            'avent' => 7,
            'ambria' => 24,
            'gaea1' => 26,
        ];

        $scenarioCards = [
            'general' => [
                'title' => 'Général',
                'image' => 'assets/img/banniere.png',
                'slug' => 'general',
            ],
            'lastparty' => [
                'title' => 'Last Party',
                'image' => 'assets/img/lastpartycard.png',
                'slug' => 'lastparty',
            ],
            'secretsfamiliaux' => [
                'title' => 'Secrets Familiaux',
                'image' => 'assets/img/secretscard.png',
                'slug' => 'secrets',
            ],
            'avent' => [
                'title' => "Le Grenier d'Arthur",
                'image' => 'assets/img/aventcard.png',
                'slug' => 'avent',
            ],
            'ambria' => [
                'title' => "Le Trésor d'Ambria",
                'image' => 'assets/img/tresorambriacard.png',
                'slug' => 'ambria',
            ],
            'gaea1' => [
                'title' => 'Station GAEA-1',
                'image' => 'assets/img/gaea1card.png',
                'slug' => 'gaea1',
            ],
        ];

        $progress = isset($member['pseudo']) ? $achievements->getScenarioProgress($member['id'], $scenarioTotals) : [];
        $globalPercent = $progress === []
            ? 0
            : round(array_sum(array_column($progress, 'percent')) / count($progress));

        $achievementSections = [];
        foreach ($scenarioCards as $scenario => $meta) {
            $all = $achievements->getAllByScenario($scenario);
            $earned = isset($member['pseudo']) ? $achievements->getEarnedByScenario($member['id'], $scenario) : [];
            $earnedIds = array_column($earned, 'id');
            $hiddenTotal = count(array_filter($all, static fn (array $item): bool => (int) ($item['cache'] ?? 0) === 1));
            $hiddenEarned = count(array_filter($earned, static fn (array $item): bool => (int) ($item['cache'] ?? 0) === 1));
            $remainingHidden = max(0, $hiddenTotal - $hiddenEarned);

            $achievementSections[] = [
                'title' => $meta['title'],
                'image' => $meta['image'],
                'progress' => $progress[$scenario]['percent'] ?? 0,
                'earned_ids' => $earnedIds,
                'items' => $all,
                'slug' => $meta['slug'],
                'remaining_hidden' => $remainingHidden,
            ];
        }

        $canAddFriend = false;
        $current = AuthService::user();
        if ($current && !$isOwner && isset($current['pseudo'], $member['pseudo'])) {
            $canAddFriend = $member['pseudo'] !== 'le narrateur'
                && !$friends->exists($current['id'], $member['id']);
        }

        if (($member['pseudo'] ?? '') === 'le narrateur' && $current && isset($current['pseudo'])) {
            $achievementService = new AchievementService();
            $achievementService->grant('general', 'narrateur', $current);
        }

        $this->view('members/show', [
            'title' => 'EscapeRPG - ' . ($isOwner ? 'Mon compte' : $member['pseudo']),
            'member' => $member,
            'isOwner' => $isOwner,
            'friends' => $friendList,
            'canAddFriend' => $canAddFriend,
            'globalProgress' => $globalPercent,
            'achievementSections' => $achievementSections,
        ]);
    }

    /**
     * Traite le changement d'avatar sur le profil courant.
     */
    private function handleAvatarUpload(?string $currentAvatar): ?string
    {
        $file = $this->request->file('avatar');
        if (!is_array($file) || ($file['error'] ?? UPLOAD_ERR_NO_FILE) === UPLOAD_ERR_NO_FILE) {
            return null;
        }

        if (($file['error'] ?? UPLOAD_ERR_OK) !== UPLOAD_ERR_OK) {
            $this->session->flash('error', 'Erreur lors de l\'upload de l\'avatar.');
            $this->response->redirect('/profil/edit');
        }

        $extension = strtolower(pathinfo($file['name'] ?? '', PATHINFO_EXTENSION));
        $allowed = ['jpg', 'jpeg', 'png'];
        if (!in_array($extension, $allowed, true)) {
            $this->session->flash('error', 'Extension invalide. Seules les images .jpg et .png sont autorisées.');
            $this->response->redirect('/profil/edit');
        }

        if (($file['size'] ?? 0) > 4 * 1024 * 1024) {
            $this->session->flash('error', 'Fichier trop volumineux. Taille maximale : 4 Mo.');
            $this->response->redirect('/profil/edit');
        }

        $uploadDir = BASE_PATH . '/public/assets/img/uploads';
        if (!is_dir($uploadDir)) {
            mkdir($uploadDir, 0775, true);
        }

        $filename = uniqid('', true) . '.' . $extension;
        $target = $uploadDir . '/' . $filename;
        if (!move_uploaded_file($file['tmp_name'], $target)) {
            $this->session->flash('error', 'Impossible d\'enregistrer l\'avatar.');
            $this->response->redirect('/profil/edit');
        }

        if ($currentAvatar && $currentAvatar !== 'narrateur.png') {
            $oldPath = $uploadDir . '/' . $currentAvatar;
            if (is_file($oldPath)) {
                unlink($oldPath);
            }
        }

        return $filename;
    }
}

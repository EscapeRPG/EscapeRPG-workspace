<?php

namespace App\Services\Account;

use App\Core\Database;
use App\Core\Session;
use App\Repositories\MemberRepository;
use App\Repositories\UserSessionRepository;

/**
 * Gère l'authentification applicative et le "remember me".
 */
class AuthService
{
    private const SESSION_KEY = 'auth.user_id';
    private const REMEMBER_COOKIE = 'session_token';

    /**
     * Restaure automatiquement une session longue si un cookie valide existe.
     */
    public static function bootstrap(): void
    {
        if (self::check()) {
            return;
        }

        $token = $_COOKIE[self::REMEMBER_COOKIE] ?? null;
        if (!$token) {
            return;
        }

        $sessions = new UserSessionRepository(Database::get());
        $userId = $sessions->findValidUserIdByToken($token);
        if (!$userId) {
            self::forgetRememberCookie();
            return;
        }

        $members = new MemberRepository(Database::get());
        $member = $members->findByUsername($userId);
        if (!$member) {
            self::forgetRememberCookie();
            return;
        }

        self::storeUser($member);
    }

    /**
     * Indique si un membre est actuellement authentifié.
     */
    public static function check(): bool
    {
        return self::session()->has(self::SESSION_KEY);
    }

    /**
     * Retourne l'identifiant logique du membre connecté.
     */
    public static function id(): ?string
    {
        return self::session()->get(self::SESSION_KEY);
    }

    /**
     * Retourne les données complètes du membre connecté.
     */
    public static function user(): ?array
    {
        $id = self::id();
        if ($id === null) {
            return null;
        }

        $members = new MemberRepository(Database::get());

        return $members->findByUsername($id);
    }

    /**
     * Tente d'authentifier un membre via son pseudo et son mot de passe.
     */
    public static function attempt(string $username, string $password, bool $remember = false): bool
    {
        $members = new MemberRepository(Database::get());
        $member = $members->findByUsername($username);
        if (!$member) {
            return false;
        }

        $passwordFromDb = $member['pass'] ?? '';
        $valid = password_verify($password, $passwordFromDb) || md5($password) === $passwordFromDb;
        if (!$valid) {
            return false;
        }

        if (md5($password) === $passwordFromDb) {
            $newHash = password_hash($password, PASSWORD_DEFAULT);
            $members->updateProfile($member['id'], $member['email'], $newHash);
            $member['pass'] = $newHash;
        }

        self::storeUser($member);

        if ($remember) {
            self::remember($member['id']);
        }

        return true;
    }

    /**
     * Connecte explicitement un membre déjà chargé.
     */
    public static function login(array $member, bool $remember = false): void
    {
        self::storeUser($member);

        if ($remember) {
            self::remember($member['id']);
        }
    }

    /**
     * Déconnecte le membre courant et nettoie les traces persistantes.
     */
    public static function logout(): void
    {
        $token = $_COOKIE[self::REMEMBER_COOKIE] ?? null;
        if ($token) {
            $sessions = new UserSessionRepository(Database::get());
            $sessions->deleteByToken($token);
        }

        self::forgetRememberCookie();
        self::session()->invalidate();
    }

    /**
     * Indique si le membre connecté possède des droits d'administration.
     */
    public static function isAdmin(): bool
    {
        return false;
    }

    /**
     * Enregistre l'utilisateur dans la session courante.
     */
    private static function storeUser(array $member): void
    {
        $session = self::session();
        $session->regenerate();
        $session->put(self::SESSION_KEY, $member['id']);
        $session->put('auth.avatar', $member['avatar'] ?? 'narrateur.png');
    }

    /**
     * Crée un jeton persistant de reconnexion automatique.
     */
    private static function remember(string $userId): void
    {
        $token = bin2hex(random_bytes(32));
        $expiresAt = date('Y-m-d H:i:s', time() + 365 * 86400);

        $sessions = new UserSessionRepository(Database::get());
        $sessions->create($userId, $token, $expiresAt);

        setcookie(
            self::REMEMBER_COOKIE,
            $token,
            [
                'expires' => time() + 365 * 86400,
                'path' => '/',
                'httponly' => true,
                'samesite' => 'Lax',
                'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
            ]
        );
    }

    /**
     * Supprime le cookie utilisé pour les sessions longues.
     */
    private static function forgetRememberCookie(): void
    {
        setcookie(
            self::REMEMBER_COOKIE,
            '',
            [
                'expires' => 1,
                'path' => '/',
                'httponly' => true,
                'samesite' => 'Lax',
                'secure' => (!empty($_SERVER['HTTPS']) && $_SERVER['HTTPS'] !== 'off'),
            ]
        );
    }

    /**
     * Retourne une façade de session pour les opérations d'authentification.
     */
    private static function session(): Session
    {
        return new Session();
    }
}

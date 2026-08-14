<?php

namespace App\Services\Account;

use App\Core\Database;
use App\Core\Session;
use App\Repositories\MemberRepository;
use App\Repositories\UserSessionRepository;
use Random\RandomException;

/**
 * Gère l'authentification applicative et le "remember me".
 */
class AuthService
{
    private const SESSION_KEY = 'auth.user_pseudo';
    private const REMEMBER_COOKIE = 'session_token';
    private static bool $userResolved = false;
    private static ?array $resolvedUser = null;

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
        $userPseudo = $sessions->findValidUserPseudoByToken($token);
        if (!$userPseudo) {
            self::forgetRememberCookie();
            return;
        }

        $members = new MemberRepository(Database::get());
        $member = $members->findByUsername($userPseudo);
        if (!$member || empty($member['email_verified_at'])) {
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
        return self::user() !== null;
    }

    /**
     * Retourne l'identifiant logique du membre connecté.
     */
    public static function pseudo(): ?string
    {
        return self::session()->get(self::SESSION_KEY);
    }

    /**
     * Retourne les données complètes du membre connecté.
     */
    public static function user(): ?array
    {
        if (self::$userResolved) {
            return self::$resolvedUser;
        }

        self::$userResolved = true;
        $pseudo = self::pseudo();
        if ($pseudo === null) {
            return null;
        }

        $members = new MemberRepository(Database::get());
        $member = $members->findByUsername($pseudo);
        if (!$member || empty($member['email_verified_at'])) {
            self::clearSessionUser();
            return null;
        }

        self::$resolvedUser = $member;

        return self::$resolvedUser;
    }

    /**
     * Tente d'authentifier un membre via son pseudo et son mot de passe.
     * @throws RandomException
     */
    public static function attempt(string $username, string $password, bool $remember = false): bool
    {
        $members = new MemberRepository(Database::get());
        $member = $members->findByUsername($username);
        if (!$member) {
            return false;
        }

        $passwordFromDb = $member['password'] ?? '';
        $valid = password_verify($password, $passwordFromDb);
        if (!$valid) {
            return false;
        }

        if (empty($member['email_verified_at'])) {
            return false;
        }

        self::storeUser($member);

        if ($remember) {
            self::remember($member['pseudo']);
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
            self::remember($member['pseudo']);
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
        self::$userResolved = true;
        self::$resolvedUser = null;
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
        $session->put(self::SESSION_KEY, $member['pseudo']);
        $session->put('auth.avatar', $member['avatar'] ?? 'default.png');
        self::$userResolved = true;
        self::$resolvedUser = $member;
    }

    /**
     * Retire uniquement l'identité authentifiée en conservant les messages flash.
     */
    private static function clearSessionUser(): void
    {
        $session = self::session();
        $session->forget(self::SESSION_KEY);
        $session->forget('auth.avatar');
        self::$userResolved = true;
        self::$resolvedUser = null;
    }

    /**
     * Crée un jeton persistant de reconnexion automatique.
     * @throws RandomException
     */
    private static function remember(string $userPseudo): void
    {
        $token = bin2hex(random_bytes(32));
        $expiresAt = date('Y-m-d H:i:s', time() + 365 * 86400);

        $sessions = new UserSessionRepository(Database::get());
        $sessions->create($userPseudo, $token, $expiresAt);

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

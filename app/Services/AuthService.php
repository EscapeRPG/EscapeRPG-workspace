<?php

namespace App\Services;

use App\Core\Database;
use App\Core\Session;
use App\Repositories\MemberRepository;
use App\Repositories\UserSessionRepository;

class AuthService
{
    private const SESSION_KEY = 'auth.user_id';
    private const REMEMBER_COOKIE = 'session_token';

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

    public static function check(): bool
    {
        return self::session()->has(self::SESSION_KEY);
    }

    public static function id(): ?string
    {
        return self::session()->get(self::SESSION_KEY);
    }

    public static function user(): ?array
    {
        $id = self::id();
        if ($id === null) {
            return null;
        }

        $members = new MemberRepository(Database::get());

        return $members->findByUsername($id);
    }

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

    public static function login(array $member, bool $remember = false): void
    {
        self::storeUser($member);

        if ($remember) {
            self::remember($member['id']);
        }
    }

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

    public static function isAdmin(): bool
    {
        return false;
    }

    private static function storeUser(array $member): void
    {
        $session = self::session();
        $session->regenerate();
        $session->put(self::SESSION_KEY, $member['id']);
        $session->put('auth.avatar', $member['avatar'] ?? 'narrateur.png');
    }

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

    private static function session(): Session
    {
        return new Session();
    }
}

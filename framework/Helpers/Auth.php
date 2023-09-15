<?php

namespace Framework\Helpers;

use App\Models\User;
use stdClass;

class Auth
{
    public static function attempt(string $email, string $password): bool
    {
        $user = (new User())
            ->where('email', $email)
            ->first();

        if (is_null($user)) {
            return false;
        }

        self::login($user);

        return password_verify($password, $user->password);
    }

    private static function login(stdClass $user): void
    {
        $_SESSION['user'] = $user;
    }

    public static function user(): null|stdClass
    {
        return self::check() ? $_SESSION['user'] : null;
    }

    public static function id(): bool|int
    {
        return self::check() ? false : $_SESSION['user']->id;
    }

    public static function check(): bool
    {
        return !is_null($_SESSION['user'] ?? null);
    }

    public static function hash(string $password): string
    {
        return password_hash($password, PASSWORD_DEFAULT);
    }

    public static function logout(): void
    {
        unset($_SESSION['user']);
    }
}
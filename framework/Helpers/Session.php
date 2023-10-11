<?php

namespace Framework\Helpers;

class Session
{
    public static function get(string $key): mixed
    {
        if (empty($_SESSION[$key])) {
            return null;
        }

        return $_SESSION[$key];
    }

    public static function put(string $key, mixed $data): void
    {
        $_SESSION[$key] = $data;
    }

    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function have(string $key): bool
    {
        return !empty($_SESSION[$key]);
    }

    public static function clear(): void
    {
        $_SESSION = [];
    }
}
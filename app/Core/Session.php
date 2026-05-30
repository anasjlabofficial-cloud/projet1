<?php

namespace App\Core;

class Session
{
    public static function get(string $key, $default = null)
    {
        return $_SESSION[$key] ?? $default;
    }

    public static function set(string $key, $value): void
    {
        $_SESSION[$key] = $value;
    }

    public static function has(string $key): bool
    {
        return isset($_SESSION[$key]);
    }

    public static function remove(string $key): void
    {
        unset($_SESSION[$key]);
    }

    public static function flash(string $key, $value = null)
    {
        if ($value !== null) {
            $_SESSION['flash'][$key] = $value;
            return;
        }

        $message = $_SESSION['flash'][$key] ?? null;
        unset($_SESSION['flash'][$key]);
        return $message;
    }

    public static function destroy(): void
    {
        session_unset();
        session_destroy();
    }
}

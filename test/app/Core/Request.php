<?php

namespace App\Core;

class Request
{
    public static function isPost(): bool
    {
        return $_SERVER['REQUEST_METHOD'] === 'POST';
    }

    public static function get(string $key, $default = null)
    {
        return self::sanitize($_GET[$key] ?? $default);
    }

    public static function post(string $key, $default = null)
    {
        return self::sanitize($_POST[$key] ?? $default);
    }

    public static function all(): array
    {
        $data = array_merge($_GET, $_POST);
        return self::sanitize($data);
    }

    public static function sanitize($data)
    {
        if (is_array($data)) {
            return array_map([self::class, 'sanitize'], $data);
        }
        return htmlspecialchars(trim((string) $data), ENT_QUOTES, 'UTF-8');
    }
}

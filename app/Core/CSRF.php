<?php

namespace App\Core;

class CSRF
{
    public static function generate(): string
    {
        if (!Session::has('csrf_token')) {
            Session::set('csrf_token', bin2hex(random_bytes(32)));
        }
        return Session::get('csrf_token');
    }

    public static function validate(?string $token): bool
    {
        if (empty($token) || !Session::has('csrf_token')) {
            return false;
        }

        return hash_equals(Session::get('csrf_token'), $token);
    }

    public static function inputField(): string
    {
        $token = self::generate();
        return '<input type="hidden" name="' . htmlspecialchars(CSRF_TOKEN_NAME, ENT_QUOTES, 'UTF-8') . '" value="' . htmlspecialchars($token, ENT_QUOTES, 'UTF-8') . '">';
    }
}
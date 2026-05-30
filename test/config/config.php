<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$runningInDocker = file_exists('/.dockerenv');

/**
 * Load .env only on the host (XAMPP). Never override Docker service env.
 */
if (!$runningInDocker) {
    $envFile = __DIR__ . '/../.env';
    if (is_readable($envFile)) {
        $lines = file($envFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
        if ($lines !== false) {
            foreach ($lines as $line) {
                $line = trim($line);
                if ($line === '' || str_starts_with($line, '#') || !str_contains($line, '=')) {
                    continue;
                }
                [$key, $value] = array_map('trim', explode('=', $line, 2));
                $value = trim($value, " \t\"'");
                if ($key !== '' && (getenv($key) === false || getenv($key) === '')) {
                    putenv("{$key}={$value}");
                    $_ENV[$key] = $value;
                }
            }
        }
    }
}

// Compute BASE_URL dynamically so the app works under a subdirectory
$scriptDir = rtrim(dirname($_SERVER['SCRIPT_NAME'] ?? ''), '/\\');
define('BASE_URL', $scriptDir === '' || $scriptDir === '/' ? '/' : $scriptDir . '/');

// Database credentials
if ($runningInDocker) {
    define('DB_HOST', getenv('DB_HOST') ?: 'db');
    define('DB_PORT', getenv('DB_PORT') ?: '3306');
    define('DB_NAME', getenv('DB_NAME') ?: 'quran_school');
    define('DB_USER', getenv('DB_USER') ?: 'quran_user');
    define('DB_PASS', getenv('DB_PASS') ?: 'secret123');
} else {
    define('DB_HOST', getenv('DB_HOST') ?: '127.0.0.1');
    define('DB_PORT', getenv('DB_PORT') ?: '3306');
    define('DB_NAME', getenv('DB_NAME') ?: 'quran_school');
    define('DB_USER', getenv('DB_USER') ?: 'root');
    define('DB_PASS', getenv('DB_PASS') !== false ? getenv('DB_PASS') : '');
}

spl_autoload_register(function ($class) {
    $prefix = 'App\\';
    $base_dir = __DIR__ . '/../app/';

    $len = strlen($prefix);
    if (strncmp($prefix, $class, $len) !== 0) {
        return;
    }

    $relative_class = substr($class, $len);
    $file = $base_dir . str_replace('\\', '/', $relative_class) . '.php';

    if (file_exists($file)) {
        require_once $file;
    }
});

require_once __DIR__ . '/app.php';
require_once __DIR__ . '/database.php';

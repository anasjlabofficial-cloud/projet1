<?php

namespace App\Models;

use Config\Database;
use PDO;

class Auth
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function attempt(string $email, string $password, string $role)
    {
        $stmt = $this->db->prepare('SELECT u.*, r.name AS role_name FROM users u JOIN roles r ON u.role_id = r.id WHERE u.email = :email AND r.name = :role LIMIT 1');
        $stmt->execute(['email' => $email, 'role' => $role]);
        $user = $stmt->fetch();

        if (!$user || !password_verify($password, $user['password']) || $user['status'] !== 'active') {
            return null;
        }

        unset($user['password']);
        return $user;
    }

    public function register(array $data): array
    {
        $required = ['first_name', 'last_name', 'email', 'password', 'phone', 'dob', 'address', 'role'];
        $errors = [];

        foreach ($required as $field) {
            if (empty($data[$field])) {
                $errors[] = "حقل $field مطلوب.";
            }
        }

        if (!filter_var($data['email'] ?? '', FILTER_VALIDATE_EMAIL)) {
            $errors[] = 'البريد الإلكتروني غير صالح.';
        }

        if (strlen($data['password'] ?? '') < 8) {
            $errors[] = 'كلمة المرور يجب أن تكون 8 أحرف على الأقل.';
        }

        if ($this->emailExists($data['email'])) {
            $errors[] = 'البريد الإلكتروني مستخدم مسبقًا.';
        }

        if (!empty($errors)) {
            return $errors;
        }

        $roleId = $this->getRoleId($data['role']);
        $stmt = $this->db->prepare('INSERT INTO users (role_id, first_name, last_name, email, password, phone, dob, address, profile_image, status, created_at) VALUES (:role_id, :first_name, :last_name, :email, :password, :phone, :dob, :address, :profile_image, :status, NOW())');
        $stmt->execute([
            'role_id' => $roleId,
            'first_name' => $data['first_name'],
            'last_name' => $data['last_name'],
            'email' => $data['email'],
            'password' => password_hash($data['password'], PASSWORD_DEFAULT),
            'phone' => $data['phone'],
            'dob' => $data['dob'],
            'address' => $data['address'],
            'profile_image' => $data['profile_image'] ?? 'assets/images/avatar-placeholder.svg',
            'status' => 'pending',
        ]);

        return [];
    }

    private function emailExists(string $email): bool
    {
        $stmt = $this->db->prepare('SELECT COUNT(*) FROM users WHERE email = :email');
        $stmt->execute(['email' => $email]);
        return $stmt->fetchColumn() > 0;
    }

    private function getRoleId(string $role): int
    {
        $stmt = $this->db->prepare('SELECT id FROM roles WHERE name = :name LIMIT 1');
        $stmt->execute(['name' => $role]);
        return (int) $stmt->fetchColumn();
    }
}

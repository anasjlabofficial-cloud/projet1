<?php

namespace App\Models;

use Config\Database;
use PDO;

class User
{
    protected PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT u.*, r.name AS role_name FROM users u JOIN roles r ON u.role_id = r.id');
        return $stmt->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT u.*, r.name AS role_name FROM users u JOIN roles r ON u.role_id = r.id WHERE u.id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
    }

    public function getUsersByRole(string $roleName): array
    {
        $stmt = $this->db->prepare('SELECT u.*, r.name AS role_name FROM users u JOIN roles r ON u.role_id = r.id WHERE r.name = :role');
        $stmt->execute(['role' => $roleName]);
        return $stmt->fetchAll();
    }

    public function getPendingUsers(): array
    {
        $stmt = $this->db->prepare('SELECT u.*, r.name AS role_name FROM users u JOIN roles r ON u.role_id = r.id WHERE u.status = :status ORDER BY u.created_at DESC');
        $stmt->execute(['status' => 'pending']);
        return $stmt->fetchAll();
    }

    public function setStatus(int $userId, string $status): bool
    {
        $stmt = $this->db->prepare('UPDATE users SET status = :status, updated_at = NOW() WHERE id = :id');
        return $stmt->execute(['status' => $status, 'id' => $userId]);
    }
}

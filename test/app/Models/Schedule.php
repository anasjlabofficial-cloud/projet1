<?php

namespace App\Models;

use Config\Database;
use PDO;

class Schedule
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAll(): array
    {
        $stmt = $this->db->query('SELECT * FROM schedules ORDER BY session_date ASC');
        return $stmt->fetchAll();
    }

    public function findById(int $id): ?array
    {
        $stmt = $this->db->prepare('SELECT * FROM schedules WHERE id = :id LIMIT 1');
        $stmt->execute(['id' => $id]);
        return $stmt->fetch() ?: null;
    }

    public function create(array $data): bool
    {
        $stmt = $this->db->prepare('INSERT INTO schedules (day_name, session_date, session_time, description, status, created_at) VALUES (:day_name, :session_date, :session_time, :description, :status, NOW())');
        return $stmt->execute([
            'day_name' => $data['day_name'],
            'session_date' => $data['session_date'],
            'session_time' => $data['session_time'],
            'description' => $data['description'],
            'status' => $data['status'],
        ]);
    }

    public function update(int $id, array $data): bool
    {
        $stmt = $this->db->prepare('UPDATE schedules SET day_name = :day_name, session_date = :session_date, session_time = :session_time, description = :description, status = :status WHERE id = :id');
        return $stmt->execute([
            'day_name' => $data['day_name'],
            'session_date' => $data['session_date'],
            'session_time' => $data['session_time'],
            'description' => $data['description'],
            'status' => $data['status'],
            'id' => $id,
        ]);
    }

    public function delete(int $id): bool
    {
        $stmt = $this->db->prepare('DELETE FROM schedules WHERE id = :id');
        return $stmt->execute(['id' => $id]);
    }
}

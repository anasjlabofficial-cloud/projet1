<?php

namespace App\Models;

use Config\Database;
use PDO;

class Student
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function getAllActive(): array
    {
        $stmt = $this->db->query('SELECT s.*, u.first_name, u.last_name FROM students s JOIN users u ON s.user_id = u.id WHERE s.status = "active" ORDER BY u.first_name ASC');
        return $stmt->fetchAll();
    }
}

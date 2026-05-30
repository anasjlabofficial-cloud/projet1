<?php

namespace App\Models;

use Config\Database;
use PDO;

class Memorization
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function createRecord(int $studentId, string $surah, int $pages, int $revisionScore): bool
    {
        $stmt = $this->db->prepare('INSERT INTO memorization_records (student_id, surah, pages_memorized, revision_score, status, created_at) VALUES (:student_id, :surah, :pages_memorized, :revision_score, :status, NOW())');
        return $stmt->execute([
            'student_id' => $studentId,
            'surah' => $surah,
            'pages_memorized' => $pages,
            'revision_score' => $revisionScore,
            'status' => 'pending',
        ]);
    }

    public function getRecent(): array
    {
        $stmt = $this->db->query('SELECT m.*, u.first_name, u.last_name FROM memorization_records m JOIN users u ON m.student_id = u.id ORDER BY m.created_at DESC LIMIT 10');
        return $stmt->fetchAll();
    }
}

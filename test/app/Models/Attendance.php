<?php

namespace App\Models;

use Config\Database;
use PDO;

class Attendance
{
    private PDO $db;

    public function __construct()
    {
        $this->db = Database::connect();
    }

    public function recordAttendance(int $studentId, string $status, string $sessionDate, ?string $note = null): bool
    {
        $stmt = $this->db->prepare('INSERT INTO attendance (student_id, session_date, status, note, created_at) VALUES (:student_id, :session_date, :status, :note, NOW())');
        return $stmt->execute([
            'student_id' => $studentId,
            'session_date' => $sessionDate,
            'status' => $status,
            'note' => $note,
        ]);
    }

    public function getRecent(): array
    {
        $stmt = $this->db->query('SELECT a.*, u.first_name, u.last_name FROM attendance a JOIN users u ON a.student_id = u.id ORDER BY a.created_at DESC LIMIT 10');
        return $stmt->fetchAll();
    }
}

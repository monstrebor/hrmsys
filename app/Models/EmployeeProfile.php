<?php
require_once "../app/Core/Database.php";

class EmployeeProfile extends Database
{
    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }
    public function create($data)
    {
        $stmt = $this->conn->prepare("
            INSERT INTO employee_profiles
            (user_id, employee_id, employee_type, department, position, campus, employment_status, date_hired)
            VALUES (?, ?, ?, ?, ?, ?, ?, ?)
        ");

        return $stmt->execute([
            $data['user_id'],
            $data['employee_id'],
            $data['employee_type'],
            $data['department'],
            $data['position'],
            $data['campus'],
            $data['employment_status'],
            $data['date_hired']
        ]);
    }

    public function findByUserId($userId)
    {
        $stmt = $this->conn->prepare("
            SELECT *
            FROM employee_profiles
            WHERE user_id = ?
            LIMIT 1
        ");

        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function all()
    {
        $stmt = $this->conn->prepare("
        SELECT 
            u.id AS user_id,
            ep.id AS employee_profile_id,
            u.name,
            u.email,
            u.isActive,
            ep.employee_id,
            ep.employee_type,
            ep.department,
            ep.position,
            ep.campus,
            ep.employment_status,
            ep.date_hired
        FROM users u
        INNER JOIN employee_profiles ep ON ep.user_id = u.id
        ORDER BY u.id DESC
    ");

        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function findFullProfileByUserId($userId)
    {
        $stmt = $this->conn->prepare("
        SELECT 
            u.id AS user_id,
            u.name,
            u.email,
            u.isActive,
            ep.id AS employee_profile_id,
            ep.employee_id,
            ep.employee_type,
            ep.department,
            ep.position,
            ep.campus,
            ep.employment_status,
            ep.date_hired,
            ep.profile_image,
            ep.cover_image
        FROM users u
        LEFT JOIN employee_profiles ep ON ep.user_id = u.id
        WHERE u.id = ?
        LIMIT 1
    ");

        $stmt->execute([$userId]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updateProfile($userId, $data)
    {
        $stmt = $this->conn->prepare("
        UPDATE employee_profiles SET
            employee_id = ?,
            employee_type = ?,
            department = ?,
            position = ?,
            campus = ?,
            employment_status = ?,
            date_hired = ?
        WHERE user_id = ?
    ");
    

        return $stmt->execute([
            $data['employee_id'],
            $data['employee_type'],
            $data['department'],
            $data['position'],
            $data['campus'],
            $data['employment_status'],
            $data['date_hired'],
            $userId
        ]);
    }
}

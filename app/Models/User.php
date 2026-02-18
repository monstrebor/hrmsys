<?php
require_once "../app/Core/Database.php";

class User extends Database
{
    public function __construct()
    {
        $this->conn = Database::getInstance()->getConnection();
    }
    public function registerWithoutPassword($name, $email, $token)
    {
        try {
            $stmt = $this->conn->prepare(
                "INSERT INTO users 
             (name, email, reset_token, reset_expires, isNew, isAdmin, isActive)
             VALUES (?, ?, ?, DATE_ADD(NOW(), INTERVAL 1 HOUR), 1, 0, 1)"
            );

            return $stmt->execute([$name, $email, $token]);
        } catch (PDOException $e) {
            if ($e->getCode() == 23000) {
                return false;
            }
            throw $e;
        }
    }
    public function isValidResetToken($token)
    {
        $stmt = $this->conn->prepare(
            "SELECT id FROM users 
         WHERE reset_token = ? AND reset_expires > NOW()"
        );
        $stmt->execute([$token]);
        return $stmt->fetch() !== false;
    }
    public function isValidToken($token)
    {
        $stmt = $this->conn->prepare(
            "SELECT id FROM users WHERE reset_token = ? AND reset_expires > NOW()"
        );
        $stmt->execute([$token]);
        return $stmt->fetch();
    }


    public function register($name, $email, $password)
    {
        try {
            $hash = password_hash($password, PASSWORD_DEFAULT);

            $stmt = $this->conn->prepare(
                "INSERT INTO users (name, email, password, isNew, isAdmin, isActive)
             VALUES (?, ?, ?, ?, ?, ?)"
            );

            return $stmt->execute([$name, $email, $hash, 1, 0, 1]);
        } catch (PDOException $e) {

            if ($e->getCode() == 23000) {
                return false;
            }

            throw $e;
        }
    }
    public function setPasswordByToken($token, $password)
    {
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $stmt = $this->conn->prepare(
            "UPDATE users 
         SET password = ?, reset_token = NULL, reset_expires = NULL, isNew = 0
         WHERE reset_token = ? AND reset_expires > NOW()"
        );

        $stmt->execute([$hash, $token]);

        return $stmt->rowCount() === 1;
    }

    public function create(array $data)
    {
        $stmt = $this->conn->prepare(
            "INSERT INTO users (name, email, password, isAdmin, isActive) VALUES (?, ?, ?, ?, ?)"
        );
        return $stmt->execute([
            $data['name'],
            $data['email'],
            $data['password'],
            $data['isAdmin'],
            1
        ]);
    }

    public function login($email, $password)
    {
        $stmt = $this->conn->prepare(
            "SELECT * FROM users WHERE email = ? LIMIT 1"
        );
        $stmt->execute([$email]);
        $user = $stmt->fetch(PDO::FETCH_ASSOC);

        if (!$user || !password_verify($password, $user['password'])) {
            return false;
        }

        if ((int)$user['isActive'] !== 1) {
            return 'inactive';
        }

        return $user;
    }

    public function all($excludeUserId = null)
    {
        $sql = "
        SELECT id, name, email, isAdmin, isActive
        FROM users
        WHERE isActive = 1
    ";

        $params = [];

        if ($excludeUserId !== null) {
            $sql .= " AND id != ?";
            $params[] = $excludeUserId;
        }

        $sql .= " ORDER BY id DESC";

        $stmt = $this->conn->prepare($sql);
        $stmt->execute($params);

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function updateUser($id, $name, $email, $isAdmin)
    {
        try {
            $stmt = $this->conn->prepare(
                "UPDATE users 
             SET name = ?, email = ?, isAdmin = ? 
             WHERE id = ?"
            );

            return $stmt->execute([$name, $email, $isAdmin, $id]);
        } catch (PDOException $e) {

            if ($e->getCode() == 23000) {
                return false;
            }
            throw $e;
        }
    }

    public function softDelete($id)
    {
        $stmt = $this->conn->prepare(
            "UPDATE users SET isActive = 0 WHERE id = ?"
        );

        return $stmt->execute([$id]);
    }

    public function allInactive()
    {
        $stmt = $this->conn->prepare(
            "SELECT id, name, email, isAdmin, isActive
         FROM users
         WHERE isActive = 0
         ORDER BY id DESC"
        );
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function activate($id)
    {
        $stmt = $this->conn->prepare(
            "UPDATE users SET isActive = 1 WHERE id = ?"
        );
        return $stmt->execute([$id]);
    }

    public function findById($id)
    {
        $stmt = $this->conn->prepare(
            "SELECT id, name, email, isAdmin, isActive 
             FROM users 
             WHERE id = ?"
        );
        $stmt->execute([$id]);
        return $stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function updatePassword($userId, $hashedPassword)
    {
        $stmt = $this->conn->prepare(
            "UPDATE users SET password = ? WHERE id = ?"
        );
        return $stmt->execute([$hashedPassword, $userId]);
    }

    public function update($id, array $data)
    {
        $fields = [];
        $params = [];

        foreach ($data as $key => $value) {
            $fields[] = "$key = ?";
            $params[] = $value;
        }

        $params[] = $id;

        $sql = "UPDATE users SET " . implode(', ', $fields) . " WHERE id = ?";

        $stmt = $this->conn->prepare($sql);
        return $stmt->execute($params);
    }
}

<?php

namespace Models;

use App\Database;

class AdminBoardModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listUsers() {
        $sqlUsers = "SELECT * FROM users";
        $users = $this->db->prepare($sqlUsers);
        $users->execute();
        return $users->fetchAll(\PDO::FETCH_ASSOC);
    }

    public function updateUserRole($username, $role) {
        $sqlUpdate = "UPDATE users SET role = :role WHERE username = :username";
        $stmt = $this->db->prepare($sqlUpdate);
        $stmt->bindParam(':role', $role, \PDO::PARAM_STR);
        $stmt->bindParam(':username', $username, \PDO::PARAM_STR);
        return $stmt->execute();
    }
}

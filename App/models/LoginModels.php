<?php
namespace Models;

use App\Database;

class LoginModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function authenticate($email,$password) {
        $sqlLogin= $this->db->prepare("SELECT * FROM users WHERE email = :email");
        $sqlLogin->bindParam(':email',$email);
        $sqlLogin->execute();
        $user = $sqlLogin->fetch(\PDO::FETCH_ASSOC);

        if ($user && password_verify($password, $user['password'])) {
            $_SESSION['id'] = $user['id'];
            $_SESSION['pseudo'] = $user['username'];
            $_SESSION['role'] = $user['role'];
            return true;
        } else {
            return false;
        }
    }
}
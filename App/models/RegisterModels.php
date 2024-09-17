<?php

namespace Models; 

use App\Database; 

class RegisterModels { 
    protected $db; 

    public function __construct() { 
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function createUserModels() { 
        if ($_POST) { 
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
            $last = date("Y-m-d H:i:s"); 
            $active = 1; 

            try {
                $pdo = $this->db->prepare("INSERT INTO users (username,email,password,last_connection,active) VALUES (?,?,?,?,?)");
                $pdo->execute([$username, $email, $password, $last, $active]);
                
                echo "<h1>Utilisateur créé avec succès</h1>"; 
            } catch (\PDOException $e) {
                echo "Erreur lors de la création de l'utilisateur : " . $e->getMessage(); 
            }
        }
    }
}
?>

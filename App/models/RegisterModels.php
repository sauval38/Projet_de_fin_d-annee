<?php

namespace Models;  // Le modèle RegisterModels appartient à l'espace de noms Models

use App\Database;  // Importation de la classe Database pour gérer la connexion à la base de données

class RegisterModels { 
    protected $db;  // Déclaration d'une propriété pour stocker la connexion à la base de données

    // Le constructeur crée une instance de la classe Database et récupère la connexion à la base de données
    public function __construct() { 
        $database = new Database();  // Création d'une instance de la classe Database
        $this->db = $database->getConnection();  // Récupère la connexion et l'affecte à la propriété $db
    }

    // Méthode pour créer un utilisateur
    public function createUserModels() { 
        if ($_POST) {  // Vérifie si des données ont été envoyées via la méthode POST
            // Récupère le nom d'utilisateur, applique htmlspecialchars pour éviter les attaques XSS
            $username = htmlspecialchars($_POST['username'], ENT_QUOTES, 'UTF-8');
            
            // Récupère et valide l'email en utilisant filter_var pour s'assurer qu'il est bien au format email
            $email = filter_var($_POST['email'], FILTER_VALIDATE_EMAIL);

            if (!$email) {  // Si l'email n'est pas valide
                echo "Adresse email non valide.";  // Affiche un message d'erreur
                return;  // Arrête l'exécution de la méthode
            }

            // Hashage du mot de passe avant de le stocker dans la base de données
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); 
            
            // Date actuelle pour la dernière connexion
            $last = date("Y-m-d H:i:s"); 
            // L'utilisateur est activé par défaut
            $active = 1; 

            try {
                // Prépare une requête SQL pour insérer un nouvel utilisateur dans la table 'users'
                $pdo = $this->db->prepare("INSERT INTO users (username,email,password,last_connection,active) VALUES (?,?,?,?,?)");
                // Exécute la requête avec les paramètres fournis
                $pdo->execute([$username, $email, $password, $last, $active]);
                
                // Message de confirmation après l'insertion réussie de l'utilisateur
                echo "<h1>Utilisateur créé avec succès</h1>"; 
            } catch (\PDOException $e) {  // En cas d'erreur avec la base de données
                // Affiche un message d'erreur si l'insertion échoue
                echo "Erreur lors de la création de l'utilisateur : " . $e->getMessage(); 
            }
        }
    }
}


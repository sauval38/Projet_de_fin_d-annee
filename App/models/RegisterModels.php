<?php
namespace Models; // Définit un espace de noms pour cette classe

use App\Database; // Importe la classe Database depuis l'espace de noms App

class RegisterModels { // Début de la déclaration de la classe RegisterModels
    protected $db; // Propriété protégée pour stocker l'instance de Database

    public function __construct() { // Constructeur de la classe
        $this->db = new Database(); // Initialise une nouvelle instance de Database pour la connexion à la base de données
    }

    public function createUser() { // Méthode publique pour créer un utilisateur
        if ($_POST) { // Vérifie s'il y a des données POST soumises
            $username = $_POST['username']; // Récupère le nom d'utilisateur depuis les données POST
            $email = $_POST['email']; // Récupère l'email depuis les données POST
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT); // Hash du mot de passe avec bcrypt depuis les données POST
            $last = date("Y-m-d H:i:s"); // Date et heure actuelles pour la dernière connexion
            $active = 1; // Indicateur d'utilisateur actif

            try {
                // Prépare la requête SQL pour insérer un nouvel utilisateur dans la table 'users'
                $pdo = $this->db->getConnection()->prepare("INSERT INTO users (username,email,password,last_connection,active) VALUES (?,?,?,?,?)");
                
                // Exécute la requête avec les valeurs bindées
                $pdo->execute([$username, $email, $password, $last, $active]);
                
                echo "<h1>Utilisateur créé avec succès</h1>"; // Affiche un message de succès après l'insertion
            } catch (\PDOException $e) {
                echo "Erreur lors de la création de l'utilisateur : " . $e->getMessage(); // Capture et affiche toute erreur PDO
            }
        }
    }
}
?>

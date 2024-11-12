<?php

namespace AdminModels; // Déclare l'espace de noms 'AdminModels' pour organiser la classe et éviter les conflits de noms.

use App\Database; // Importe la classe 'Database' de l'espace de noms 'App' pour gérer la connexion à la base de données.

class AdminBoardModels { // Déclare la classe 'AdminBoardModels', qui sera responsable de gérer les actions de l'admin dans le tableau de bord.

    protected $db; // Déclare une propriété protégée '$db' pour stocker la connexion à la base de données.

    // Constructeur de la classe. Il crée une instance de la classe Database et initialise la connexion.
    public function __construct() {
        $database = new Database(); // Crée une nouvelle instance de la classe 'Database' pour gérer la connexion à la base de données.
        $this->db = $database->getConnection(); // Appelle la méthode 'getConnection' pour récupérer la connexion et l'affecte à la propriété '$db'.
    }

    // Méthode pour récupérer tous les utilisateurs de la base de données.
    public function listUsers() {
        $sqlUsers = "SELECT * FROM users"; // Déclare la requête SQL pour récupérer tous les utilisateurs dans la table 'users'.
        $users = $this->db->prepare($sqlUsers); // Prépare la requête SQL en vue de son exécution.
        $users->execute(); // Exécute la requête préparée.
        return $users->fetchAll(\PDO::FETCH_ASSOC); // Retourne les résultats de la requête sous forme d'un tableau associatif.
    }

    // Méthode pour mettre à jour le rôle d'un utilisateur dans la base de données.
    public function updateUserRole($username, $role) {
        $sqlUpdate = "UPDATE users SET role = :role WHERE username = :username"; // Déclare la requête SQL pour mettre à jour le rôle de l'utilisateur dans la table 'users'.
        $stmt = $this->db->prepare($sqlUpdate); // Prépare la requête SQL.
        $stmt->bindParam(':role', $role, \PDO::PARAM_STR); // Lie la valeur de '$role' au paramètre ':role' dans la requête SQL en spécifiant que c'est une chaîne de caractères.
        $stmt->bindParam(':username', $username, \PDO::PARAM_STR); // Lie la valeur de '$username' au paramètre ':username' dans la requête SQL en spécifiant que c'est une chaîne de caractères.
        return $stmt->execute(); // Exécute la requête SQL pour mettre à jour les informations de l'utilisateur et retourne un booléen indiquant le succès de l'exécution.
    }
}

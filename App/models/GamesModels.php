<?php

namespace Models;  // Le modèle GamesModels appartient à l'espace de noms Models

use App\Database;  // Importation de la classe Database pour gérer la connexion à la base de données

class GamesModels {
    protected $db;  // Déclaration d'une propriété pour stocker la connexion à la base de données

    // Le constructeur crée une instance de la classe Database et récupère la connexion à la base de données
    public function __construct() {
        $database = new Database();  // Création d'une instance de la classe Database
        $this->db = $database->getConnection();  // Récupère la connexion et l'affecte à la propriété $db
    }
    
    // Méthode pour récupérer les informations d'un jeu à partir de son ID
    public function games($id) {
        // Requête SQL pour sélectionner un jeu avec un ID spécifique
        $sqlGames = "SELECT * FROM games WHERE id = ?"; 
        
        // Préparation de la requête SQL pour la sécurité (protection contre les injections SQL)
        $games = $this->db->prepare($sqlGames);
        
        // Exécution de la requête en passant l'ID du jeu comme paramètre
        $games->execute([$id]);
        
        // Retourne le jeu sous forme de tableau associatif
        return $games->fetch();  
    }
}

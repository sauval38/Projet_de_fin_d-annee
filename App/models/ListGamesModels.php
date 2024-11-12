<?php

namespace Models;  // Le modèle ListGamesModels appartient à l'espace de noms Models

use App\Database;  // Importation de la classe Database pour gérer la connexion à la base de données

class ListGamesModels {
    protected $db;  // Déclaration d'une propriété pour stocker la connexion à la base de données

    // Le constructeur crée une instance de la classe Database et récupère la connexion à la base de données
    public function __construct() {
        $database = new Database();  // Création d'une instance de la classe Database
        $this->db = $database->getConnection();  // Récupère la connexion et l'affecte à la propriété $db
    }

    // Méthode pour récupérer la liste de tous les jeux
    public function gameList() {
        // Requête SQL pour sélectionner tous les jeux de la table 'games'
        $sqlListGames = "SELECT * FROM games"; 
        
        // Préparation de la requête SQL pour la sécurité (protection contre les injections SQL)
        $listGames = $this->db->prepare($sqlListGames);
        
        // Exécution de la requête sans paramètres
        $listGames->execute();
        
        // Retourne tous les jeux sous forme de tableau associatif
        return $listGames->fetchAll();  
    }
}

   
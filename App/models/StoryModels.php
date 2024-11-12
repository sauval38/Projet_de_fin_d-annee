<?php

namespace Models;  // Le modèle StoryModels appartient à l'espace de noms Models

use App\Database;  // Importation de la classe Database pour gérer la connexion à la base de données

class StoryModels { 
    protected $db;  // Déclaration d'une propriété pour stocker la connexion à la base de données

    // Le constructeur crée une instance de la classe Database et récupère la connexion à la base de données
    public function __construct() { 
        $database = new Database();  // Création d'une instance de la classe Database
        $this->db = $database->getConnection();  // Récupère la connexion et l'affecte à la propriété $db
    }
    
    // Méthode pour récupérer les informations de l'histoire d'un jeu basé sur l'ID
    public function storyModels($id) { 
        // Requête SQL pour sélectionner le titre, l'image, l'histoire et le chemin d'un jeu basé sur son ID
        $sqlStory = "SELECT titles_article, images_article, story_article, path FROM games WHERE id = ?";
        
        // Prépare et exécute la requête SQL avec l'ID du jeu passé en paramètre
        $story = $this->db->prepare($sqlStory);
        $story->execute([$id]);
        
        // Retourne les résultats de la requête sous forme de tableau associatif
        return $story->fetch();  
    }
}

<?php

namespace Models;  // Le modèle CharacterModels appartient à l'espace de noms Models

use App\Database;  // Importation de la classe Database pour gérer la connexion à la base de données

class CharacterModels {
    protected $db;  // Déclaration d'une propriété pour stocker la connexion à la base de données

    // Le constructeur crée une instance de la classe Database et récupère la connexion à la base de données
    public function __construct() {
        $database = new Database();  // Création d'une instance de la classe Database
        $this->db = $database->getConnection();  // Récupère la connexion et l'affecte à la propriété $db
    }

    // Méthode pour récupérer la liste des personnages d'un jeu spécifique par son ID
    public function listCharacter($id) {
        // Requête SQL pour récupérer les informations des personnages associés à un jeu spécifique
        $sqlCharacter = "SELECT 
                            g.titles_article,  // Récupère le titre de l'article (jeu)
                            c.names_character,  // Le nom du personnage
                            c.descriptions_character,  // La description du personnage
                            c.jobs_character,  // Le job (classe) du personnage
                            c.limits_break_character,  // Les capacités limites du personnage
                            c.age_character,  // L'âge du personnage
                            c.armed_character,  // Les armes équipées du personnage
                            c.size_character,  // La taille du personnage
                            c.date_o_birth_character,  // La date de naissance du personnage
                            c.place_of_birth_character,  // Le lieu de naissance du personnage
                            c.path,  // Le chemin d'accès à l'image du personnage
                            c.images_character  // Le nom de l'image du personnage
                        FROM 
                            `character` c  // Table des personnages
                        JOIN 
                            `games` g  // Table des jeux
                        ON 
                            c.games_id = g.id  // Jointure entre les personnages et les jeux, basée sur l'ID du jeu
                        WHERE 
                            g.id = ?";  // Condition pour récupérer les personnages du jeu avec l'ID spécifié

        // Préparation de la requête SQL pour la sécurité (protection contre les injections SQL)
        $character = $this->db->prepare($sqlCharacter);

        // Exécution de la requête avec l'ID du jeu comme paramètre
        $character->execute([$id]);

        // Retourne tous les résultats sous forme de tableau
        return  $character->fetchAll(); 
    }
}

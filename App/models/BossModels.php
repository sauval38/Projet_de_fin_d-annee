<?php

namespace Models;  // Le modèle BossModels appartient à l'espace de noms Models

use App\Database;  // Importation de la classe Database pour gérer la connexion à la base de données

class BossModels {
    protected $db;  // Déclaration d'une propriété pour stocker la connexion à la base de données

    // Le constructeur crée une instance de la classe Database et récupère la connexion à la base de données
    public function __construct() {
        $database = new Database();  // Création d'une instance de la classe Database
        $this->db = $database->getConnection();  // Récupère la connexion et l'affecte à la propriété $db
    }

    // Méthode pour récupérer la liste des boss d'un jeu spécifique par son ID
    public function listBoss($id) {
        // Requête SQL pour récupérer les informations des boss associés à un jeu spécifique
        $sqlBoss = "SELECT 
                g.titles_article,  // Récupère le titre de l'article (jeu)
                b.id,  // L'ID du boss
                b.games_id,  // L'ID du jeu auquel appartient le boss
                b.name_boss,  // Le nom du boss
                b.descriptions_boss,  // La description du boss
                b.HP_boss,  // Les points de vie du boss
                b.MP_boss,  // Les points de magie du boss
                b.loots_boss,  // Les objets ou loots obtenus après avoir vaincu le boss
                b.weakness_boss,  // Les faiblesses du boss
                b.location_boss,  // L'emplacement du boss dans le jeu
                b.gils_boss,  // Le montant de gils (monnaie) donné par le boss
                b.experiences_boss,  // L'expérience donnée par le boss
                b.images_boss,  // Le nom de l'image associée au boss
                b.path  // Le chemin d'accès à l'image du boss
            FROM 
                games g  // Table des jeux
            JOIN 
                boss b ON g.id = b.games_id  // Jointure avec la table des boss
            WHERE 
                g.id = :id";  // Condition pour récupérer les boss du jeu avec l'ID spécifié

        // Préparation de la requête SQL pour la sécurité (protection contre les injections SQL)
        $boss = $this->db->prepare($sqlBoss);

        // Liaison du paramètre :id à la variable $id en tant qu'entier
        $boss->bindParam(':id', $id, \PDO::PARAM_INT); 

        // Exécution de la requête
        $boss->execute();

        // Retourne tous les résultats sous forme de tableau associatif
        return $boss->fetchAll(\PDO::FETCH_ASSOC);
    }
}

<?php

namespace AdminModels;

use App\Database;  // Importation de la classe Database pour gérer la connexion à la base de données

class ListModifyCharacterModels {
    protected $db;  // Déclaration de la propriété pour stocker la connexion à la base de données

    // Le constructeur est appelé lors de l'instanciation de la classe
    public function __construct() {
        $database = new Database();  // Création d'une instance de la classe Database
        $this->db = $database->getConnection();  // Récupère la connexion à la base de données et l'affecte à la propriété $db
    }

    // Méthode pour récupérer les données des personnages à partir de la base de données
    public function listModify() {
        // Définition de la requête SQL pour récupérer toutes les lignes de la table 'games'
        $sqlListModifyCharacter = "SELECT * FROM games";  
        
        // Préparation de la requête SQL pour l'exécution, permet d'éviter les injections SQL
        $listModifyCharacter = $this->db->prepare($sqlListModifyCharacter);  
        
        // Exécution de la requête préparée
        $listModifyCharacter->execute();  
        
        // Récupération de tous les résultats sous forme de tableau associatif et retour des résultats
        return $listModifyCharacter->fetchAll();  
    }
}

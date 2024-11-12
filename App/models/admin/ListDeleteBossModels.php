<?php

namespace AdminModels; // Déclare l'espace de noms 'AdminModels', permettant de regrouper les classes liées à la gestion des jeux et des boss dans une même catégorie.

use App\Database; // Importe la classe 'Database' de l'espace de noms 'App' pour gérer la connexion à la base de données.

class ListDeleteBossModels { // Déclare la classe 'ListDeleteBossModels', qui sera utilisée pour récupérer la liste des jeux dans lesquels les boss peuvent être supprimés.

    protected $db; // Déclare une propriété protégée '$db' pour stocker la connexion à la base de données.

    // Constructeur de la classe qui initialise la connexion à la base de données.
    public function __construct() {
        $database = new Database(); // Crée une instance de la classe 'Database' pour gérer la connexion à la base de données.
        $this->db = $database->getConnection(); // Récupère la connexion à la base de données et l'affecte à la propriété '$db'.
    }

    // Méthode pour récupérer la liste des jeux dans lesquels les boss peuvent être supprimés.
    public function listDelete() {
        $sqlListDeleteBoss = "SELECT * FROM games"; // Déclare la requête SQL pour récupérer tous les jeux depuis la table 'games'.
        $listDeleteBoss = $this->db->prepare($sqlListDeleteBoss); // Prépare la requête SQL pour l'exécution.
        $listDeleteBoss->execute(); // Exécute la requête SQL pour récupérer toutes les entrées de la table 'games'.
        return $listDeleteBoss->fetchAll(); // Retourne tous les résultats sous forme de tableau. Chaque ligne représente un jeu.
    }
}

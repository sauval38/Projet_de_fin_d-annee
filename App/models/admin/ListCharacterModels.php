<?php

namespace AdminModels; // Déclare l'espace de noms 'AdminModels', permettant d'organiser le code et d'éviter les conflits de noms.

use App\Database; // Importe la classe 'Database' de l'espace de noms 'App' pour gérer la connexion à la base de données.

class ListCharacterModels { // Déclare la classe 'ListCharacterModels', responsable de la gestion des personnages dans un jeu.

    protected $db; // Déclare une propriété protégée '$db' pour stocker la connexion à la base de données.

    // Constructeur de la classe qui initialise la connexion à la base de données.
    public function __construct() {
        $database = new Database(); // Crée une instance de la classe 'Database' pour gérer la connexion à la base de données.
        $this->db = $database->getConnection(); // Appelle la méthode 'getConnection' pour récupérer la connexion et l'affecte à la propriété '$db'.
    }

    // Méthode pour récupérer les personnages associés à un jeu spécifique en fonction de l'ID du jeu.
    public function listModify($id) {
        $sqlListCharacter = "SELECT * FROM `character` WHERE games_id = ?"; // Déclare la requête SQL pour récupérer tous les personnages associés à un jeu donné, en utilisant l'ID du jeu.
        $listCharacter = $this->db->prepare($sqlListCharacter); // Prépare la requête SQL pour l'exécution.
        $listCharacter->execute([$id]); // Exécute la requête SQL en passant l'ID du jeu en paramètre pour récupérer les personnages associés.
        return $listCharacter->fetchAll(); // Retourne tous les résultats sous forme d'un tableau. Chaque ligne correspond à un personnage.
    }
}

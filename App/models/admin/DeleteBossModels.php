<?php

namespace AdminModels; // Déclare l'espace de noms 'AdminModels' pour organiser la classe et éviter les conflits de noms.

use App\Database; // Importe la classe 'Database' de l'espace de noms 'App' pour gérer la connexion à la base de données.

class DeleteBossModels { // Déclare la classe 'DeleteBossModels', qui est responsable de la gestion de la suppression des boss dans la base de données.

    protected $db; // Déclare une propriété protégée '$db' pour stocker la connexion à la base de données.

    // Constructeur de la classe, qui initialise la connexion à la base de données.
    public function __construct() {
        $database = new Database(); // Crée une nouvelle instance de la classe 'Database' pour gérer la connexion à la base de données.
        $this->db = $database->getConnection(); // Appelle la méthode 'getConnection' pour récupérer la connexion et l'affecte à la propriété '$db'.
    }

    // Méthode pour récupérer tous les boss d'un jeu spécifique à partir de la base de données.
    public function listDelete($game_id) {
        $sqlBossDelete = "SELECT * FROM boss WHERE games_id = ?"; // Déclare la requête SQL pour récupérer tous les boss associés à un jeu donné (en utilisant l'ID du jeu).
        $BossDelete = $this->db->prepare($sqlBossDelete); // Prépare la requête SQL pour l'exécution.
        $BossDelete->execute([$game_id]); // Exécute la requête SQL en passant l'ID du jeu en paramètre pour récupérer les boss.
        return $BossDelete->fetchAll(); // Retourne tous les résultats sous forme d'un tableau. Chaque ligne correspond à un boss.
    }

    // Méthode pour supprimer un boss de la base de données en fonction de son ID.
    public function deleteBoss($bossId) {
        try {
            $sqlDeleteChildren = "DELETE FROM boss WHERE id = :id"; // Déclare la requête SQL pour supprimer un boss à partir de son ID.
            $deleteChildren = $this->db->prepare($sqlDeleteChildren); // Prépare la requête SQL pour l'exécution.
            $deleteChildren->bindParam(':id', $bossId, \PDO::PARAM_INT); // Lie la valeur de '$bossId' au paramètre ':id' dans la requête SQL en spécifiant que c'est un entier.
            return $deleteChildren->execute(); // Exécute la requête SQL pour supprimer le boss et retourne un booléen indiquant le succès ou l'échec de l'opération.
        } catch (\PDOException $e) { // Capture une exception PDO en cas d'erreur lors de l'exécution de la requête SQL.
            echo 'Erreur lors de la suppression : ' . $e->getMessage(); // Affiche un message d'erreur avec les détails de l'exception.
            return false; // Retourne false pour indiquer que la suppression a échoué.
        }
    }
}

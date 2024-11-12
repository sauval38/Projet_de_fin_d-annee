<?php

namespace AdminModels; // Déclare l'espace de noms 'AdminModels', permettant une organisation propre du code et évitant les conflits de noms.

use App\Database; // Importe la classe 'Database' de l'espace de noms 'App' pour gérer la connexion à la base de données.

class DeleteCharacterModels { // Déclare la classe 'DeleteCharacterModels', qui est responsable de la gestion de la suppression des personnages dans la base de données.

    protected $db; // Déclare une propriété protégée '$db' pour stocker la connexion à la base de données.

    // Constructeur de la classe qui initialise la connexion à la base de données.
    public function __construct() {
        $database = new Database(); // Crée une nouvelle instance de la classe 'Database' pour gérer la connexion à la base de données.
        $this->db = $database->getConnection(); // Appelle la méthode 'getConnection' pour récupérer la connexion et l'affecte à la propriété '$db'.
    }

    // Méthode pour récupérer les personnages associés à un jeu spécifique en fonction de l'ID du jeu.
    public function listDelete($game_id) {
        $sqlCharacterDelete = "SELECT * FROM `character` WHERE games_id = ?"; // Déclare la requête SQL pour récupérer tous les personnages associés à un jeu donné (en utilisant l'ID du jeu).
        $CharacterDelete = $this->db->prepare($sqlCharacterDelete); // Prépare la requête SQL pour l'exécution.
        $CharacterDelete->execute([$game_id]); // Exécute la requête SQL en passant l'ID du jeu en paramètre pour récupérer les personnages associés.
        return $CharacterDelete->fetchAll(); // Retourne tous les résultats sous forme d'un tableau. Chaque ligne correspond à un personnage.
    }

    // Méthode pour supprimer un personnage spécifique de la base de données.
    public function deleteCharacter($characterId) {
        try { // Commence un bloc try pour gérer les erreurs potentielles lors de la suppression.
            $sqlDeleteChildren = "DELETE FROM `character` WHERE id = :id"; // Déclare la requête SQL pour supprimer un personnage en fonction de son ID.
            $deleteChildren = $this->db->prepare($sqlDeleteChildren); // Prépare la requête SQL pour l'exécution.
            $deleteChildren->bindParam(':id', $characterId, \PDO::PARAM_INT); // Lie le paramètre ':id' à la valeur de '$characterId' (type entier).
            return $deleteChildren->execute(); // Exécute la requête pour supprimer le personnage et retourne le résultat de l'exécution.
        } catch (\PDOException $e) { // Attrape les exceptions générées lors de l'exécution de la requête.
            echo 'Erreur lors de la suppression : ' . $e->getMessage(); // Affiche un message d'erreur si la suppression échoue.
            return false; // Retourne false pour indiquer que la suppression a échoué.
        }
    }
}

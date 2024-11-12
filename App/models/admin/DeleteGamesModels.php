<?php

namespace AdminModels; // Déclaration de l'espace de noms pour organiser le code en regroupant les classes liées à la logique métier des jeux administrés.

use App\Database; // Importation de la classe Database pour gérer la connexion à la base de données.

class DeleteGamesModels { // Déclaration de la classe DeleteGamesModels, responsable des opérations de suppression des jeux.
    protected $db; // Propriété protégée pour stocker l'instance de connexion à la base de données.

    public function __construct() { // Constructeur de la classe, exécuté lors de la création d'une instance.
        $database = new Database(); // Création d'une nouvelle instance de la classe Database pour établir la connexion.
        $this->db = $database->getConnection(); // Récupération de la connexion à la base de données et attribution à la propriété $db.
    }

    public function listeDelete() { // Méthode pour récupérer la liste des jeux à supprimer.
        $sqlListDelete = "SELECT * FROM games"; // Déclaration de la requête SQL pour sélectionner tous les enregistrements de la table 'games'.
        $listDelete = $this->db->prepare($sqlListDelete); // Préparation de la requête SQL pour une exécution sécurisée.
        $listDelete->execute(); // Exécution de la requête préparée.
        return $listDelete->fetchAll(); // Récupération de tous les résultats sous forme de tableau associatif et retour.
    }

    public function deleteGame($gameId) { // Méthode pour supprimer un jeu en fonction de son ID.
        try { // Bloc try pour gérer les exceptions potentielles lors des opérations sur la base de données.
            $sqlDeleteChildren = "DELETE FROM `character` WHERE games_id = :id"; // Requête SQL pour supprimer les personnages associés au jeu.
            $deleteChildren = $this->db->prepare($sqlDeleteChildren); // Préparation de la requête SQL pour la suppression des personnages.
            $deleteChildren->bindParam(':id', $gameId, \PDO::PARAM_INT); // Liaison de l'ID du jeu à la requête pour éviter les injections SQL.
            $deleteChildren->execute(); // Exécution de la requête pour supprimer les personnages associés.
     
            $sqlDelete = "DELETE FROM games WHERE id = :id"; // Requête SQL pour supprimer le jeu de la table 'games'.
            $delete = $this->db->prepare($sqlDelete); // Préparation de la requête pour supprimer le jeu.
            $delete->bindParam(':id', $gameId, \PDO::PARAM_INT); // Liaison de l'ID du jeu à la requête.
            return $delete->execute(); // Exécution de la requête et retour du résultat (true si la suppression réussit, false sinon).
        } catch (\PDOException $e) { // Bloc catch pour intercepter les exceptions de type PDO.
            echo 'Erreur lors de la suppression : ' . $e->getMessage(); // Affichage d'un message d'erreur en cas d'exception.
            return false; // Retourne false pour indiquer que la suppression a échoué.
        }
    }
}

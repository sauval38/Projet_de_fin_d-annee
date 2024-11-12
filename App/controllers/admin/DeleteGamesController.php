<?php

namespace AdminControllers; // Déclaration de l'espace de noms pour organiser le code.

use AdminViews\DeleteGamesViews; // Importation de la classe DeleteGamesViews pour gérer les vues liées à la suppression des jeux.
use AdminModels\DeleteGamesModels; // Importation de la classe DeleteGamesModels pour gérer les opérations de suppression des jeux dans la base de données.

class DeleteGamesController { // Déclaration de la classe DeleteGamesController qui gère la logique de suppression des jeux.
    protected $deleteGamesViews; // Propriété protégée pour stocker l'instance de DeleteGamesViews.
    protected $deleteGamesModels; // Propriété protégée pour stocker l'instance de DeleteGamesModels.

    public function __construct() { // Constructeur de la classe, appelé lors de la création d'une instance.
        $this->deleteGamesViews = new DeleteGamesViews(); // Création d'une nouvelle instance de DeleteGamesViews.
        $this->deleteGamesModels = new DeleteGamesModels(); // Création d'une nouvelle instance de DeleteGamesModels.
    }

    public function listGamesDelete() { // Méthode pour lister les jeux à supprimer.
        $games = $this->deleteGamesModels->listeDelete(); // Appel à la méthode listeDelete() pour récupérer tous les jeux de la base de données.
        $this->deleteGamesViews->listDeleteGames($games); // Appel à la méthode listDeleteGames() pour afficher la liste des jeux récupérés.
    }

    public function deleteGame($gameId) { // Méthode pour supprimer un jeu basé sur son ID.
        $success = $this->deleteGamesModels->deleteGame($gameId); // Appel à la méthode deleteGame() avec l'ID du jeu pour le supprimer.
        if ($success) { // Vérification si la suppression a réussi.
            echo "Reussite de la suppression."; // Affichage d'un message de succès.
            exit(); // Arrêt du script après la suppression réussie.
        } else { // Si la suppression a échoué.
            echo "Échec de la suppression."; // Affichage d'un message d'échec.
        }
    }
}

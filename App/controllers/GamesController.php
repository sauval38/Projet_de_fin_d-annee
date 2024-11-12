<?php
// Déclaration du namespace pour organiser la classe GamesController
namespace Controllers;

// Importation des classes nécessaires
use Views\GamesViews;  // Pour afficher la vue des jeux
use Models\GamesModels;  // Pour gérer la logique des jeux

// Définition de la classe GamesController
class GamesController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $gamesViews;
    protected $gamesModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de GamesViews pour afficher les informations des jeux
        $this->gamesViews = new GamesViews();
        // Création d'une instance de GamesModels pour récupérer les données liées aux jeux
        $this->gamesModels = new GamesModels();
    }

    // Méthode pour afficher les détails d'un jeu
    public function game() {
        // Récupère l'ID du jeu passé dans l'URL via GET, sinon assigne null
        $id = $_GET['id'] ?? null; 

        // Si l'ID est fourni
        if ($id) {
            // Récupère les informations du jeu en appelant la méthode "games" du modèle
            $game = $this->gamesModels->games($id);
            // Affiche les informations du jeu en appelant la méthode "displayGame" de la vue
            $this->gamesViews->displayGame($game);
        } else {
            // Si aucun ID n'est fourni, afficher un message d'erreur
            echo 'ID de jeu non fourni';
        }
    }
}

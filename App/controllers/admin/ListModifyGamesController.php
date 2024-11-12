<?php
// Déclare un namespace pour organiser la classe ListModifyGamesController
namespace AdminControllers;

// Importation des classes ListModifyGamesViews et ListModifyGamesModels depuis leurs namespaces respectifs
use AdminViews\ListModifyGamesViews;
use AdminModels\ListModifyGamesModels;

// Définition de la classe ListModifyGamesController
class ListModifyGamesController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $listModifyGamesViews;
    protected $listModifyGamesModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de ListModifyGamesViews
        $this->listModifyGamesViews = new ListModifyGamesViews();
        // Création d'une instance de ListModifyGamesModels
        $this->listModifyGamesModels = new ListModifyGamesModels();
    }

    // Méthode pour lister les jeux à modifier
    public function listModifyGames() {
        // Récupération des informations des jeux à modifier depuis le modèle
        $games = $this->listModifyGamesModels->listModifyGame();
        // Appel de la méthode de vue pour afficher les jeux à modifier
        $this->listModifyGamesViews->listModifyGames($games);
    }
}

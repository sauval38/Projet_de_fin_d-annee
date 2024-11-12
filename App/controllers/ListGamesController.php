<?php

// Déclaration du namespace pour organiser la classe ListGamesController
namespace Controllers;

// Importation des classes nécessaires pour la gestion des jeux et de l'affichage des jeux
use Models\ListGamesModels;
use Views\ListGamesViews;

class ListGamesController {
    // Déclaration des propriétés protégées pour les instances des vues et des modèles
    protected $listGamesViews;
    protected $listGamesModels;

    // Constructeur de la classe, il instancie les vues et modèles nécessaires
    public function __construct() {
        // Création d'une instance de la vue ListGamesViews pour l'affichage des jeux
        $this->listGamesViews = new ListGamesViews();
        // Création d'une instance du modèle ListGamesModels pour récupérer les jeux depuis la base de données
        $this->listGamesModels = new ListGamesModels();
    }

    // Méthode pour récupérer et afficher la liste des jeux
    public function gamlist() {
        // Appel de la méthode gameList() du modèle pour récupérer la liste des jeux
        $games = $this->listGamesModels->gameList();
        // Appel de la méthode list() de la vue pour afficher les jeux récupérés
        $this->listGamesViews->list($games);
    }
}

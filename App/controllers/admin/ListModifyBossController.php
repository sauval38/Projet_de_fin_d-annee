<?php
// Déclare un namespace pour organiser la classe ListModifyBossController
namespace AdminControllers;

// Importation des classes ListModifyBossViews et ListModifyBossModels depuis leurs namespaces respectifs
use AdminViews\ListModifyBossViews;
use AdminModels\ListModifyBossModels;

// Définition de la classe ListModifyBossController
class ListModifyBossController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $listModifyBossViews;
    protected $listModifyBossModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de ListModifyBossViews
        $this->listModifyBossViews = new ListModifyBossViews();
        // Création d'une instance de ListModifyBossModels
        $this->listModifyBossModels = new ListModifyBossModels();
    }

    // Méthode pour lister les boss à modifier
    public function listModifyBoss() {
        // Récupération des informations des boss à modifier depuis le modèle
        $games = $this->listModifyBossModels->listModify();
        // Appel de la méthode de vue pour afficher les boss à modifier
        $this->listModifyBossViews->listModifyBoss($games);
    }
}

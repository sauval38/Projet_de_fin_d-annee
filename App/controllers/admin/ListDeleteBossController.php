<?php
// Déclare un namespace pour organiser la classe ListDeleteBossController
namespace AdminControllers;

// Importation des classes ListDeleteBossViews et ListDeleteBossModels depuis leurs namespaces respectifs
use AdminViews\ListDeleteBossViews;
use AdminModels\ListDeleteBossModels;

// Définition de la classe ListDeleteBossController
class ListDeleteBossController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $listDeleteBossViews;
    protected $listDeleteBossModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de ListDeleteBossViews
        $this->listDeleteBossViews = new ListDeleteBossViews();
        // Création d'une instance de ListDeleteBossModels
        $this->listDeleteBossModels = new ListDeleteBossModels();
    } 

    // Méthode pour lister les boss disponibles pour suppression
    public function listBossCharacter() {
        // Récupération de la liste des boss à supprimer depuis le modèle
        $games = $this->listDeleteBossModels->listDelete();
        // Appel de la méthode de vue pour afficher les boss à supprimer
        $this->listDeleteBossViews->listDeleteBoss($games);
    }
}

<?php
// Déclare un namespace pour organiser la classe ListDeleteCharacterController
namespace AdminControllers;

// Importation des classes ListDeleteCharacterViews et ListDeleteCharacterModels depuis leurs namespaces respectifs
use AdminViews\ListDeleteCharacterViews;
use AdminModels\ListDeleteCharacterModels;

// Définition de la classe ListDeleteCharacterController
class ListDeleteCharacterController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $listDeleteCharacterViews;
    protected $listDeleteCharacterModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de ListDeleteCharacterViews
        $this->listDeleteCharacterViews = new ListDeleteCharacterViews();
        // Création d'une instance de ListDeleteCharacterModels
        $this->listDeleteCharacterModels = new ListDeleteCharacterModels();
    } 

    // Méthode pour lister les personnages disponibles pour suppression
    public function listDeleteCharacter() {
        // Récupération de la liste des personnages à supprimer depuis le modèle
        $games = $this->listDeleteCharacterModels->listDelete();
        // Appel de la méthode de vue pour afficher les personnages à supprimer
        $this->listDeleteCharacterViews->listDeleteCharacter($games);
    }
}

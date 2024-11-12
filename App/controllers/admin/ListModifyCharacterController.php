<?php
// Déclare un namespace pour organiser la classe ListModifyCharacterController
namespace AdminControllers;

// Importation des classes ListModifyCharacterViews et ListModifyCharacterModels depuis leurs namespaces respectifs
use AdminViews\ListModifyCharacterViews;
use AdminModels\ListModifyCharacterModels;

// Définition de la classe ListModifyCharacterController
class ListModifyCharacterController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $listModifyCharacterViews;
    protected $listModifyCharacterModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de ListModifyCharacterViews
        $this->listModifyCharacterViews = new ListModifyCharacterViews();
        // Création d'une instance de ListModifyCharacterModels
        $this->listModifyCharacterModels = new ListModifyCharacterModels();
    } 

    // Méthode pour lister les personnages à modifier
    public function listModifyCharacter() {
        // Récupération des informations des personnages à modifier depuis le modèle
        $games = $this->listModifyCharacterModels->listModify();
        // Appel de la méthode de vue pour afficher les personnages à modifier
        $this->listModifyCharacterViews->listModifyCharacter($games);
    }
}

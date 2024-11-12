<?php
// Déclare un namespace pour organiser la classe ListCharacterController
namespace AdminControllers;

// Importation des classes ListCharacterViews et ListCharacterModels depuis leurs namespaces respectifs
use AdminViews\ListCharacterViews;
use AdminModels\ListCharacterModels;

// Définition de la classe ListCharacterController
class ListCharacterController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $listCharacterViews;
    protected $listCharacterModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de ListCharacterViews
        $this->listCharacterViews = new ListCharacterViews();
        // Création d'une instance de ListCharacterModels
        $this->listCharacterModels = new ListCharacterModels();
    } 

    // Méthode pour lister les informations du personnage à modifier
    public function listModifyCharacter($id) {
        // Récupération de l'ID du personnage depuis les paramètres GET, si disponible
        $id = $_GET['id'] ?? null;
        // Vérifie si un ID a été fourni
        if ($id) {
            // Récupération des informations du personnage à modifier depuis le modèle
            $characters = $this->listCharacterModels->listModify($id);
            // Appel de la méthode de vue pour afficher les informations du personnage
            $this->listCharacterViews->listCharacter($characters);
        } else {
            // Message d'erreur si l'ID est inexistant
            echo 'Affichage inexistant';
        }
    }
}

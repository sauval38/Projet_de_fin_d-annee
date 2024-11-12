<?php
// Déclare un namespace pour organiser la classe ListBossController
namespace AdminControllers;

// Importation des classes ListBossViews et ListBossModels depuis leurs namespaces respectifs
use AdminViews\ListBossViews;
use AdminModels\ListBossModels;

// Définition de la classe ListBossController
class ListBossController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $listBossViews;
    protected $listBossModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de ListBossViews
        $this->listBossViews = new ListBossViews();
        // Création d'une instance de ListBossModels
        $this->listBossModels = new ListBossModels();
    } 

    // Méthode pour lister les informations du boss à modifier
    public function listModifyBoss($id) {
        // Récupération de l'ID du boss depuis les paramètres GET, si disponible
        $id = $_GET['id'] ?? null;
        // Vérifie si un ID a été fourni
        if ($id) {
            // Récupération des informations du boss à modifier depuis le modèle
            $boss = $this->listBossModels->listModify($id);
            // Appel de la méthode de vue pour afficher les informations du boss
            $this->listBossViews->listCharacter($boss);
        } else {
            // Message d'erreur si l'ID est inexistant
            echo 'Affichage inexistant';
        }
    }
}

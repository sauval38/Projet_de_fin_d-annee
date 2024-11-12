<?php
// Déclare un namespace pour organiser la classe ButtonAdminController
namespace AdminControllers;

// Importation de la classe ButtonAdminViews depuis son namespace
use AdminViews\ButtonAdminViews;

// Définition de la classe ButtonAdminController
class ButtonAdminController {
    // Déclaration d'une propriété protégée pour la vue
    protected $buttonAdminViews;

    // Constructeur de la classe qui initialise la vue
    public function __construct() {
        // Création d'une instance de ButtonAdminViews
        $this->buttonAdminViews = new ButtonAdminViews();
    }

    // Méthode pour afficher un bouton en utilisant la vue
    public function boutton() {
        // Appel de la méthode button() de ButtonAdminViews pour afficher le bouton
        $this->buttonAdminViews->button();
    }
}

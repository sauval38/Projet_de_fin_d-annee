<?php

// Déclaration du namespace pour organiser la classe PrivacyPolicyController
namespace Controllers;

// Importation de la classe PrivacyPolicyViews qui gère l'affichage de la politique de confidentialité
use Views\PrivacyPolicyViews;

class PrivacyPolicyController {
    // Déclaration de la propriété protégée pour l'instance de la vue PrivacyPolicyViews
    protected $privacyPolicyViews;

    // Constructeur de la classe, il instancie la vue PrivacyPolicyViews
    public function __construct() {
        // Création d'une instance de la vue PrivacyPolicyViews pour l'affichage de la politique de confidentialité
        $this->privacyPolicyViews = new PrivacyPolicyViews();
    }

    // Méthode pour afficher la politique de confidentialité
    public function privacy() {
        // Appel de la méthode privacyPolicy() de la vue pour afficher le contenu de la politique de confidentialité
        $this->privacyPolicyViews->privacyPolicy();
    }
}

<?php

// Déclaration du namespace pour organiser la classe LegalNoticesController
namespace Controllers;

// Importation de la classe LegalNoticesViews pour gérer l'affichage des mentions légales
use Views\LegalNoticesViews;

class LegalNoticesController {
    // Déclaration d'une propriété protégée pour l'instance de LegalNoticesViews
    protected $legalNoticeViews;

    // Constructeur de la classe, instancie la vue pour les mentions légales
    public function __construct() {
        // Création d'une instance de la vue LegalNoticesViews
        $this->legalNoticeViews = new LegalNoticesViews;
    }

    // Méthode pour afficher les mentions légales
    public function notice() {
        // Appel de la méthode legalNotices() de LegalNoticesViews pour afficher les mentions légales
        $this->legalNoticeViews->legalNotices();
    }
}

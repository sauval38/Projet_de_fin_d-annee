<?php
// Déclare un namespace pour organiser la classe BossController
namespace Controllers;

// Importation des classes BossViews et BossModels depuis leurs namespaces respectifs
use Views\BossViews;
use Models\BossModels;

// Définition de la classe BossController
class BossController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $bossViews;
    protected $bossModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de BossViews pour gérer les vues liées aux bosses
        $this->bossViews = new BossViews();
        // Création d'une instance de BossModels pour gérer les données des bosses
        $this->bossModels = new BossModels();
    }

    // Méthode pour afficher les informations d'un boss basé sur l'ID du jeu
    public function boss() {
        // Récupère l'ID du jeu depuis l'URL
        $id = $_GET['id'] ?? null;
        
        // Si un ID de jeu est présent
        if ($id) {
            // Récupère les données du boss associées à cet ID via le modèle
            $game = $this->bossModels->listBoss($id);
            // Passe les données du boss à la vue pour affichage
            $this->bossViews->bossViews($game);
        } else {
            // Si l'ID du jeu n'est pas trouvé, affiche un message d'erreur
            echo 'ID de jeu non fourni';
        }
    }
}

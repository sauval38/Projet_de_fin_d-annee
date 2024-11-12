<?php
// Déclare un namespace pour organiser les classes de ce fichier
namespace AdminControllers;

// Importation des classes AddBossViews et AddBossModels depuis leurs namespaces respectifs
use AdminViews\AddBossViews;
use AdminModels\AddBossModels;

// Définition de la classe AddBossController
class AddBossController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $addBossViews;
    protected $addBossModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de AddBossViews
        $this->addBossViews = new AddBossViews();
        // Création d'une instance de AddBossModels
        $this->addBossModels = new AddBossModels(); 
    }

    // Méthode pour ajouter un boss en affichant les titres à partir du modèle
    public function addBoss() {
        // Récupération des titres depuis le modèle
        $titles = $this->addBossModels->getTitles();
        // Appel de la méthode de vue pour afficher l'interface d'ajout de boss
        $this->addBossViews->addBossViews($titles);
    }

    // Méthode pour ajouter l'image d'un boss
    public function addBossImage() {
        // Vérifie si des données ont été envoyées via le formulaire et si un fichier image a été téléchargé
        if (isset($_POST) && isset($_FILES["images_path"])) {

            // Récupération des données du formulaire
            $games_id = $_POST["titles"]; // ID du jeu sélectionné
            $names_boss = $_POST["names"]; // Nom du boss
            $descriptions_boss = $_POST["descriptions"]; // Description du boss
            $HP_boss = $_POST["HP"]; // Points de vie du boss
            $MP_boss = $_POST["MP"]; // Points de magie du boss
            $loots_boss = $_POST["loots"]; // Objets laissés par le boss
            $weakness_boss = $_POST["weakness"]; // Faiblesse du boss
            $location_boss = $_POST["location"]; // Lieu où se trouve le boss
            $gils_boss = $_POST["gils"]; // Gils (monnaie) laissés par le boss
            $experiences_boss = $_POST["experiences"]; // Points d'expérience gagnés
            $images_boss = $_FILES["images_path"]; // Chemin de l'image du boss
            $path = 'assets/images/'; // Chemin de stockage des images

            // Appel de la méthode du modèle pour ajouter le boss avec l'image
            $this->addBossModels->addBossWithImage(
                $games_id, 
                $names_boss, 
                $descriptions_boss, 
                $HP_boss, 
                $MP_boss, 
                $loots_boss, 
                $weakness_boss, 
                $location_boss, 
                $gils_boss, 
                $experiences_boss, 
                $images_boss, 
                $path
            );
        } else {
            // Message d'erreur si tous les champs nécessaires ne sont pas fournis
            echo "Veuillez fournir tous les champs nécessaires.";
        }
    }
}

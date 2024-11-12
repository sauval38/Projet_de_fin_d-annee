<?php
// Déclare un namespace pour organiser les classes de ce fichier
namespace AdminControllers;

// Importation des classes AddCharacterViews et AddCharacterModels depuis leurs namespaces respectifs
use AdminViews\AddCharacterViews;
use AdminModels\AddCharacterModels;

// Définition de la classe AddCharacterController
class AddCharacterController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $addCharacterViews;
    protected $addCharacterModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de AddCharacterViews
        $this->addCharacterViews = new AddCharacterViews();
        // Création d'une instance de AddCharacterModels
        $this->addCharacterModels = new AddCharacterModels();
    }

    // Méthode pour ajouter un personnage en affichant les titres à partir du modèle
    public function addCharacter() {
        // Récupération des titres depuis le modèle
        $titles = $this->addCharacterModels->getTitles();
        // Appel de la méthode de vue pour afficher l'interface d'ajout de personnage
        $this->addCharacterViews->addCharacterViews($titles);
    }

    // Méthode pour ajouter l'image d'un personnage
    public function addCharacterImage() {
        // Vérifie si des données ont été envoyées via le formulaire et si un fichier image a été téléchargé
        if (isset($_POST) && isset($_FILES["images_path"])) {
            // Récupération des données du formulaire
            $games_id = $_POST["titles"]; // ID du jeu sélectionné
            $names_character = $_POST["names"]; // Nom du personnage
            $descriptions_character = $_POST["descriptions"]; // Description du personnage
            $jobs_character = $_POST["jobs"]; // Métier ou rôle du personnage
            $limits_break_character = $_POST["limits_break"]; // Limite de puissance du personnage
            $age_character = $_POST["age"]; // Âge du personnage
            $armed_character = $_POST["armed"]; // Arme utilisée par le personnage
            // Remplace les virgules par des points pour la taille (pour gérer les formats numériques)
            $size_character = str_replace(",", ".", $_POST["size"]);
            $date_o_birth_character = $_POST["date_o_birth"]; // Date de naissance du personnage
            $place_of_birth_character = $_POST["place_of_birth"]; // Lieu de naissance du personnage
            $images_character = $_FILES["images_path"]; // Chemin de l'image du personnage
            $path = 'assets/images/'; // Chemin de stockage des images

            // Appel de la méthode du modèle pour ajouter le personnage avec l'image
            $this->addCharacterModels->addCharacterWithImage(
                $games_id, 
                $names_character, 
                $descriptions_character, 
                $jobs_character, 
                $limits_break_character, 
                $age_character, 
                $armed_character, 
                $size_character, 
                $date_o_birth_character, 
                $place_of_birth_character, 
                $images_character, 
                $path
            );
        } else {
            // Message d'erreur si tous les champs nécessaires ne sont pas fournis
            echo "Veuillez fournir tous les champs nécessaires.";
        }
    }
}

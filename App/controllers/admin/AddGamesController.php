<?php

namespace AdminControllers; // Déclare l'espace de noms 'Controllers' pour organiser les classes.

use AdminViews\AddGamesViews; // Importe la classe 'AddGamesViews' depuis l'espace de noms 'Views'.
use AdminModels\AddGamesModels; // Importe la classe 'AddGamesModels' depuis l'espace de noms 'Models'.

class AddGamesController { // Déclare la classe 'AddGamesController'.
    protected $addGamesViews; // Propriété pour stocker l'instance de 'AddGamesViews'.
    protected $addGamesModels; // Propriété pour stocker l'instance de 'AddGamesModels'.

    public function __construct() { // Constructeur de la classe.
        $this->addGamesViews = new AddGamesViews(); // Initialise 'addGamesViews' avec une nouvelle instance de 'AddGamesViews'.
        $this->addGamesModels = new AddGamesModels(); // Initialise 'addGamesModels' avec une nouvelle instance de 'AddGamesModels'.
    }

    public function addGames() { // Méthode pour afficher le formulaire d'ajout de jeu.
        $this->addGamesViews->add(); // Appelle la méthode 'add()' de 'AddGamesViews' pour afficher la vue d'ajout de jeu.
    }

    public function addGame() { // Méthode pour gérer la soumission du formulaire et ajouter un jeu.
        
        if (isset($_POST) && isset($_FILES["images_path"])) { // Vérifie que les données POST et le fichier image sont présents.

            // Récupère les données soumises via le formulaire.
            $titles_article = $_POST["titles"]; // Récupère le titre du jeu.
            $descriptions_article = $_POST["descriptions"]; // Récupère la description du jeu.
            $story_article = $_POST["story"]; // Récupère l'histoire du jeu.
            $platforms_article = $_POST["platforms"]; // Récupère les plateformes compatibles du jeu.
            $modes_article = $_POST["modes"]; // Récupère les modes de jeu.
            $genres_article = $_POST["genres"]; // Récupère les genres du jeu.
            $designers_article = $_POST["designers"]; // Récupère les noms des designers du jeu.
            $developers_article = $_POST["developers"]; // Récupère les noms des développeurs.
            $editors_article = $_POST["editors"]; // Récupère les noms des éditeurs.
            $gameplay_article = $_POST["gameplay"]; // Récupère le gameplay du jeu.
            $informations_article = $_POST["informations"]; // Récupère les informations supplémentaires.
            $dates_release = $_POST["dates"]; // Récupère la date de sortie du jeu.
            $images_article = $_FILES["images_path"]; // Récupère le fichier image téléchargé.
            $path = 'assets/images/'; // Définit le chemin où l'image sera stockée.

            // Appelle la méthode 'addGameWithImage' dans 'AddGamesModels' pour ajouter le jeu avec l'image.
            $this->addGamesModels->addGameWithImage(
                $titles_article, $descriptions_article, $story_article, $platforms_article, 
                $modes_article, $genres_article, $designers_article, $developers_article, 
                $editors_article, $gameplay_article, $informations_article, 
                $dates_release, $images_article, $path
            );
        } 
        else { // Si les champs nécessaires ne sont pas fournis, affiche un message d'erreur.
            echo "Veuillez fournir tous les champs nécessaires."; // Message d'erreur indiquant que les champs sont manquants.
        }
    }
}

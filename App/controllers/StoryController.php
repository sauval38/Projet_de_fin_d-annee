<?php
namespace Controllers;

// Importation des classes nécessaires pour la gestion de l'affichage de l'histoire et de la logique
use Views\StoryViews;
use Models\StoryModels;

class StoryController {
    // Déclaration des propriétés pour stocker les objets des vues et des modèles
    protected $storyViews;
    protected $storyModels;

    // Le constructeur initialise les objets pour les vues et les modèles
    public function __construct() {
        // Instanciation de StoryViews pour gérer l'affichage des histoires
        $this->storyViews = new StoryViews();
        // Instanciation de StoryModels pour gérer la logique de récupération des données de l'histoire
        $this->storyModels = new StoryModels();
    }

    // Méthode pour afficher l'histoire d'un jeu
    public function storyController() {
        // Récupération de l'ID du jeu passé en paramètre dans l'URL
        $id = $_GET['id'] ?? null; 

        // Si l'ID est présent dans l'URL
        if ($id) {
            // Appel de la méthode storyModels() pour récupérer l'histoire du jeu par son ID
            $story = $this->storyModels->storyModels($id);
            // Appel de la méthode storyView() pour afficher l'histoire récupérée
            $this->storyViews->storyView($story);
        } else {
            // Si l'ID n'est pas fourni, afficher un message d'erreur
            echo 'ID de jeu non fourni';
        }
    }
}

<?php
// Déclare un namespace pour organiser la classe CharacterController
namespace Controllers;

// Importation des classes CharacterViews et CharacterModels depuis leurs namespaces respectifs
use Views\CharacterViews;
use Models\CharacterModels;

// Définition de la classe CharacterController
class CharacterController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $characterViews;
    protected $characterModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de CharacterViews pour gérer les vues liées aux personnages
        $this->characterViews = new CharacterViews();
        // Création d'une instance de CharacterModels pour gérer les données des personnages
        $this->characterModels = new CharacterModels();
    }

    // Méthode pour afficher les informations d'un personnage basé sur l'ID du jeu
    public function character() {
        // Récupère l'ID du jeu depuis l'URL
        $id = $_GET['id'] ?? null;
        
        // Si un ID de jeu est présent
        if ($id) {
            // Récupère les données du personnage associées à cet ID via le modèle
            $game = $this->characterModels->listCharacter($id);
            // Passe les données du personnage à la vue pour affichage
            $this->characterViews->characterViews($game);
        } else {
            // Si l'ID du jeu n'est pas trouvé, affiche un message d'erreur
            echo 'Personnage de jeu non fourni';
        }
    }
}

<?php
// Déclare un namespace pour organiser la classe DeleteCharacterController
namespace AdminControllers;

// Importation des classes DeleteCharacterViews et DeleteCharacterModels depuis leurs namespaces respectifs
use AdminViews\DeleteCharacterViews;
use AdminModels\DeleteCharacterModels;

// Définition de la classe DeleteCharacterController
class DeleteCharacterController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $deleteCharacterViews;
    protected $deleteCharacterModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de DeleteCharacterViews
        $this->deleteCharacterViews = new DeleteCharacterViews();
        // Création d'une instance de DeleteCharacterModels
        $this->deleteCharacterModels = new DeleteCharacterModels();
    }

    // Méthode pour lister les personnages à supprimer
    public function listCharacterDelete($game_id) {
        // Récupération de l'ID du jeu depuis les paramètres GET, si disponible
        $game_id = $_GET['gameId'] ?? null;
        // Vérifie si un game_id a été fourni
        if ($game_id) {
            // Récupération des informations des personnages à supprimer depuis le modèle
            $games = $this->deleteCharacterModels->listDelete($game_id);
            // Appel de la méthode de vue pour afficher la liste des jeux à supprimer
            $this->deleteCharacterViews->listDeleteGames($games);
        } else {
            // Message d'erreur si l'ID du jeu n'est pas fourni
            echo 'NON GAME ID';
        }
    }

    // Méthode pour supprimer un personnage
    public function deleteCharacter() {
        // Récupération de l'ID du personnage depuis les données POST
        $characterId = $_POST['character_id'];
        // Appel de la méthode du modèle pour supprimer le personnage, et vérification de la réussite
        $success = $this->deleteCharacterModels->deleteCharacter($characterId);
        // Affiche un message de succès ou d'échec en fonction du résultat
        if ($success) {
            echo "Reussite de la suppression.";
        } else {
            echo "Échec de la suppression.";
        }
    }
}

<?php
// Déclare un namespace pour organiser la classe DeleteBossController
namespace AdminControllers;

// Importation des classes DeleteBossViews et DeleteBossModels depuis leurs namespaces respectifs
use AdminViews\DeleteBossViews;
use AdminModels\DeleteBossModels;

// Définition de la classe DeleteBossController
class DeleteBossController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $deleteBossViews;
    protected $deleteBossModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de DeleteBossViews
        $this->deleteBossViews = new DeleteBossViews();
        // Création d'une instance de DeleteBossModels
        $this->deleteBossModels = new DeleteBossModels();
    }

    // Méthode pour lister les boss à supprimer
    public function listBossDelete($game_id) {
        // Récupération de l'ID du jeu depuis les paramètres GET, si disponible
        $game_id = $_GET['gameId'] ?? null;
        // Vérifie si un game_id a été fourni
        if ($game_id) {
            // Récupération des informations des boss à supprimer depuis le modèle
            $games = $this->deleteBossModels->listDelete($game_id);
            // Appel de la méthode de vue pour afficher la liste des boss à supprimer
            $this->deleteBossViews->listDeleteBoss($games);
        } else {
            // Message d'erreur si l'ID du jeu n'est pas fourni
            echo 'NON GAME ID';
        }
    }

    // Méthode pour supprimer un boss
    public function deleteBoss() {
        // Récupération de l'ID du boss depuis les données POST
        $bossId = $_POST['boss_id'];
        // Appel de la méthode du modèle pour supprimer le boss, et vérification de la réussite
        $success = $this->deleteBossModels->deleteBoss($bossId);
        // Affiche un message de succès ou d'échec en fonction du résultat
        if ($success) {
            echo "Reussite de la suppression.";
        } else {
            echo "Échec de la suppression.";
        }
    }
}

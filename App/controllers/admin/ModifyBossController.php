<?php
// Déclare un namespace pour organiser la classe ModifyBossController
namespace AdminControllers;

// Importation des classes ModifyBossViews et ModifyBossModels depuis leurs namespaces respectifs
use AdminViews\ModifyBossViews;
use AdminModels\ModifyBossModels;

// Définition de la classe ModifyBossController
class ModifyBossController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $modifyBossViews;
    protected $modifyBossModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de ModifyBossViews pour gérer les vues
        $this->modifyBossViews = new ModifyBossViews();
        // Création d'une instance de ModifyBossModels pour gérer les données du boss
        $this->modifyBossModels = new ModifyBossModels();
    }

    // Méthode pour afficher le formulaire de modification d'un boss
    public function modifyBossController() {
        // Récupère l'ID du boss à modifier via l'URL
        $bossId = $_GET['bossId'] ?? null;
        
        // Si un ID de boss est présent
        if ($bossId) {
            // Récupération des informations du boss depuis le modèle
            $boss = $this->modifyBossModels->modify($bossId);
            // Affichage du formulaire de mise à jour avec les informations du boss
            $this->modifyBossViews->updateForm($boss);
        } else {
            // Si l'ID du boss n'est pas trouvé, affiche un message d'erreur
            echo 'Modification non enregistrée';
        }
    }

    // Méthode pour mettre à jour les informations du boss dans la base de données
    public function updateBossController() {
        // Appel de la méthode update() du modèle pour effectuer la mise à jour
        $this->modifyBossModels->update();
    }
}

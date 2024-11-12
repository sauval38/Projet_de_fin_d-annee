<?php
// Déclare un namespace pour organiser la classe ModifyCharacterController
namespace AdminControllers;

// Importation des classes ModifyCharacterViews et ModifyCharacterModels depuis leurs namespaces respectifs
use AdminViews\ModifyCharacterViews;
use AdminModels\ModifyCharacterModels;

// Définition de la classe ModifyCharacterController
class ModifyCharacterController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $modifyCharacterViews;
    protected $modifyCharacterModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de ModifyCharacterViews pour gérer les vues
        $this->modifyCharacterViews = new ModifyCharacterViews();
        // Création d'une instance de ModifyCharacterModels pour gérer les données des personnages
        $this->modifyCharacterModels = new ModifyCharacterModels();
    }

    // Méthode pour afficher le formulaire de modification d'un personnage
    public function modifyCharacter() {
        // Récupère l'ID du personnage à modifier via l'URL
        $characterId = $_GET['characterId'] ?? null;
        
        // Si un ID de personnage est présent
        if ($characterId) {
            // Récupération des informations du personnage depuis le modèle
            $character = $this->modifyCharacterModels->modify($characterId);
            // Affichage du formulaire de mise à jour avec les informations du personnage
            $this->modifyCharacterViews->updateForm($character);
        } else {
            // Si l'ID du personnage n'est pas trouvé, affiche un message d'erreur
            echo 'Modification non enregistrée';
        }
    }

    // Méthode pour mettre à jour les informations du personnage dans la base de données
    public function updateGames() {
        // Appel de la méthode update() du modèle pour effectuer la mise à jour
        $this->modifyCharacterModels->update();
    }
}

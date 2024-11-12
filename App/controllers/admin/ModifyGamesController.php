<?php

namespace AdminControllers; // Déclaration de l'espace de noms pour organiser le code en regroupant les classes liées aux contrôleurs administratifs.

use AdminViews\ModifyGamesViews; // Importation de la classe ModifyGamesViews pour gérer les vues liées à la modification des jeux.
use AdminModels\ModifyGamesModels; // Importation de la classe ModifyGamesModels pour gérer la logique de modification des jeux.

class ModifyGamesController { // Déclaration de la classe ModifyGamesController, responsable de la logique de modification des jeux.
    protected $modifyGamesViews; // Propriété protégée pour stocker l'instance de ModifyGamesViews.
    protected $modifyGamesModels; // Propriété protégée pour stocker l'instance de ModifyGamesModels.

    public function __construct() { // Constructeur de la classe, exécuté lors de la création d'une instance.
        $this->modifyGamesViews = new ModifyGamesViews(); // Création d'une nouvelle instance de ModifyGamesViews.
        $this->modifyGamesModels = new ModifyGamesModels(); // Création d'une nouvelle instance de ModifyGamesModels.
    }

    public function modifyGamesController() { // Méthode pour gérer la modification d'un jeu.
        $id = $_GET['id'] ?? null; // Récupération de l'ID du jeu à modifier depuis l'URL, ou null si non spécifié.
        if ($id) { // Vérification si un ID a été fourni.
            $modify = $this->modifyGamesModels->modifyGamesModels($id); // Appel à la méthode pour récupérer les données du jeu à modifier.
            $this->modifyGamesViews->FormModifyViews($modify); // Appel à la méthode pour afficher le formulaire de modification avec les données récupérées.
        } else { // Si aucun ID n'est spécifié.
            echo 'Modification non enregistrée'; // Affichage d'un message d'erreur.
        }
    }

    public function updateGamesController() { // Méthode pour gérer la mise à jour des informations d'un jeu.
        $this->modifyGamesModels->updateModels(); // Appel à la méthode pour mettre à jour les données du jeu.
    }
}

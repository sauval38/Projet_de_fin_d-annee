<?php

namespace Controllers;

// Importation des classes Models et Views nécessaires pour la gestion de l'inscription
use Models\RegisterModels;
use Views\RegisterViews;

class RegisterController {
    // Déclaration de propriétés protégées pour les instances des modèles et des vues
    protected $registerModels;
    protected $registerViews;

    // Le constructeur initialise les instances de RegisterModels et RegisterViews
    public function __construct() {
        // Création d'une instance de RegisterModels pour gérer la logique d'inscription
        $this->registerModels = new RegisterModels();
        // Création d'une instance de RegisterViews pour gérer l'affichage du formulaire d'inscription
        $this->registerViews = new RegisterViews();
    }

    // Méthode pour afficher le formulaire d'inscription
    public function registerController() {
        // Appel de la méthode registerFormView() de RegisterViews pour afficher le formulaire d'inscription
        $this->registerViews->registerFormView();
    }

    // Méthode pour enregistrer l'utilisateur en appelant la méthode du modèle RegisterModels
    public function userSaveController() {
        // Appel de la méthode createUserModels() de RegisterModels pour créer un nouvel utilisateur dans la base de données
        $this->registerModels->createUserModels();
    }
}

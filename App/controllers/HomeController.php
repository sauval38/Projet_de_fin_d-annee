<?php

// Déclaration du namespace pour organiser la classe HomeController
namespace Controllers;

// Importation de la classe HomeViews pour gérer l'affichage de la vue d'accueil
use Views\HomeViews;

class HomeController {
    // Méthode qui gère l'affichage de la page d'accueil
    public function home() {
        // Création d'une instance de la vue d'accueil
        $homeViews = new HomeViews();
        
        // Tableau contenant les données nécessaires pour afficher la page d'accueil
        $data = [
            'slide_1_image' => './assets/images/image_d_accueil.webp',  // Chemin de l'image pour le premier slide
            'slide_1_title' => 'Bienvenue dans l\'univers de Final Fantasy',  // Titre pour le premier slide
            'slide_2_image' => './assets/images/image_d_accueil_2.webp',  // Chemin de l'image pour le deuxième slide
            'slide_2_title' => 'Bienvenue dans l\'univers de Final Fantasy',  // Titre pour le deuxième slide
            'slide_3_image' => './assets/images/image_d_accueil_3.webp',  // Chemin de l'image pour le troisième slide
            'slide_3_title' => 'Bienvenue dans l\'univers de Final Fantasy'  // Titre pour le troisième slide
        ];
        
        // Appel de la méthode 'body' de la vue d'accueil pour afficher la page avec les données
        $homeViews->body($data); 
    }
}

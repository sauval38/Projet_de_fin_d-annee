<?php

namespace Controllers;

use Views\HomeViews;

class HomeController {
    public function home() {
        $homeViews = new HomeViews();
        
        // Créez un tableau de données dynamiques à passer à la vue
        $data = [
            'slide_1_image' => './assets/images/image_d_accueil.webp',
            'slide_1_title' => 'Bienvenue dans l\'univers de Final Fantasy',
            'slide_2_image' => './assets/images/image_d_accueil_2.webp',
            'slide_2_title' => 'Bienvenue dans l\'univers de Final Fantasy',
            'slide_3_image' => './assets/images/image_d_accueil_3.webp',
            'slide_3_title' => 'Bienvenue dans l\'univers de Final Fantasy'
        ];
        
        $homeViews->body($data); // Passez les données à la vue
    }
}
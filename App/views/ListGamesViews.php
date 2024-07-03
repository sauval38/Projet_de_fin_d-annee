<?php

namespace Views; // Définit un espace de noms pour cette classe

class ListGamesViews { // Début de la déclaration de la classe ListGamesViews
    public function list($games) { // Début de la méthode publique list qui prend un tableau $games en paramètre
        echo '<h1>LISTE DES JEUX</h1>'; // Affiche le titre "LISTE DES JEUX"
        echo '<div class="games-container">'; // Déclare le conteneur pour les jeux
        foreach ($games as $game) { // Boucle à travers chaque jeu dans le tableau $games
            echo '<div class="game-card">'; // Déclare le conteneur pour les jeux
            echo '<a href="games/'.$game['id'].'">' . $game['titles_article'] . '</a>'; // Affiche un lien vers le jeu avec son titre
            echo '<p>'. $game['descriptions_article'] .'</p>'; // Affiche la description du jeu
            echo '<img src="' . $game['path'] . '/' . $game['images_article'] . '">'; // Affiche l'image du jeu
            echo '</div>'; // Ferme le conteneur des jeux
        }
        echo '</div>'; // Ferme le conteneur des jeux
    }
}
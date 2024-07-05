<?php

namespace Views;

class ListModifyGamesViews {
    public function listmodify($games) {
        echo '<h1>LISTE DES JEUX</h1>';
        echo '<div class="games-container">'; 
        foreach ($games as $game) { 
            echo '<div class="game-card">'; 
            echo '<a href="admin/modifierunjeux/'.$game['id'].'">' . $game['titles_article'] . '</a>'; 
            echo '<p>'. $game['descriptions_article'] .'</p>'; 
            echo '<img src="' . $game['path'] . '/' . $game['images_article'] . '">';
            echo '</div>'; 
        }
        echo '</div>'; 
    }
}
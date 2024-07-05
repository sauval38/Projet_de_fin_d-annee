<?php

namespace Views; 

class ListGamesViews { 
    public function list($games) { 
        echo '<h1>LISTE DES JEUX</h1>'; 
        echo '<div class="games-container">'; 
        foreach ($games as $game) { 
            echo '<div class="game-card">'; 
            echo '<h2 class="game-title" data-game-id="'.$game['id'].'">' . $game['titles_article'] . '</h2>'; 
            echo '<div class="additional-links" id="links-'.$game['id'].'" style="display:none;">';
            echo '<a href="games/'.$game['id'].'">Informations</a>';
            echo '<a href="games/'.$game['id'].'">Histoire</a>';
            echo '<a href="games/'.$game['id'].'">Personnage</a>';
            echo '<a href="games/'.$game['id'].'">Boss</a>';
            echo '</div>';
            echo '<p>'. $game['descriptions_article'] .'</p>'; 
            echo '<img src="' . $game['path'] . '/' . $game['images_article'] . '">'; 
            echo '</div>'; 
        }
        echo '</div>'; 
        echo'<script src="./assets/js/games.js"></script>';
    }
}
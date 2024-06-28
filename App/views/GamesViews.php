<?php
namespace Views;

class GamesViews {
    public function list($games) {
        echo '<h1>LISTE DES JEUX</h1>';
        foreach ($games as $game) {
            echo '<a href="">' . $game['title_article'] . '</a>';
            echo '<p>'. $game['description_article'].'</p>';
            echo '<img src="' . $game['path'] . '/' . $game['image_article'] . '">';
        }
    }
}   
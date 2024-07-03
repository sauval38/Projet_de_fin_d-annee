<?php
namespace Controllers;

use Views\GamesViews;
use Models\GamesModels;

class GamesController {
    protected $gamesViews;
    protected $gamesModels;

    public function __construct() {
        $this->gamesViews = new GamesViews();
        $this->gamesModels = new GamesModels();
    }

    public function game() {
        $id = $_GET['id'] ?? null; 
        if ($id) {
            $game = $this->gamesModels->games($id);
            $this->gamesViews->displayGame($game);
        } else {
            echo 'ID de jeu non fourni';
        }
    }
}   
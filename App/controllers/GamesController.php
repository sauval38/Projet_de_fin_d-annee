<?php
namespace Controllers;

use Models\GamesModels;
use Views\GamesViews;

class GamesController {
    protected $gamesViews;
    protected $gamesModels;

    public function __construct() {
        $this->gamesViews = new GamesViews();
        $this->gamesModels = new GamesModels();
    }
    public function gamesList() {
        $this->gamesViews->list();
    }
    public function gamlist() {
        $this->gamesModels->gameList();
    }
}
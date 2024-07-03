<?php
namespace Controllers;

use Models\ListGamesModels;
use Views\ListGamesViews;

class ListGamesController {
    protected $listGamesViews;
    protected $listGamesModels;

    public function __construct() {
        $this->listGamesViews = new ListGamesViews();
        $this->listGamesModels = new ListGamesModels();
    }
    public function gamlist() {
        $games = $this->listGamesModels->gameList();
        $this->listGamesViews->list($games);
    }
}
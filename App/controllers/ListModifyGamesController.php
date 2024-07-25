<?php
namespace Controllers;

use Views\ListModifyGamesViews;
use Models\ListModifyGamesModels;

class ListModifyGamesController {
    protected $listModifyGamesViews;
    protected $listModifyGamesModels;


    public function __construct() {
        $this->listModifyGamesViews = new ListModifyGamesViews();
        $this->listModifyGamesModels = new ListModifyGamesModels();
    }

    public function listModifyGames() {
        $games = $this->listModifyGamesModels->listModifyGame();
        $this->listModifyGamesViews->listModifyGames($games);
    }
}  
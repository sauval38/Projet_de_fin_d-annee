<?php
namespace Controllers;

use Views\DeleteGamesViews;
class DeleteGamesController {
    protected $deleteGamesViews;

    public function __construct() {
        $this->deleteGamesViews = new DeleteGamesViews();
    }

    public function gamesDelete() {
        $this->deleteGamesViews->deleteGames();
    }
}
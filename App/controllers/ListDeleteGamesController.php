<?php
namespace Controllers;

use Views\ListDeleteGamesViews;
use Models\ListDeleteGamesModels;

class ListDeleteGamesController {
    protected $listDeleteGamesViews;
    protected $listDeleteGamesModels;

    public function __construct() {
        $this->listDeleteGamesViews = new ListDeleteGamesViews();
        $this->listDeleteGamesModels = new ListDeleteGamesModels();
    }

    public function listGamesDelete() {
        $games = $this->listDeleteGamesModels->listeDelete();
        $this->listDeleteGamesViews->listDeleteGames($games);
    }

    public function deleteGame($gameId) {
        $success = $this->listDeleteGamesModels->deleteGame($gameId);
        if ($success) {
            echo "Reussite de la suppression.";
            exit();
        } else {
            echo "Échec de la suppression.";
        }
    }
}
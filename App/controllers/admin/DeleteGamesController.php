<?php

namespace AdminControllers;

use AdminViews\DeleteGamesViews;
use AdminModels\DeleteGamesModels;

class DeleteGamesController {
    protected $deleteGamesViews;
    protected $deleteGamesModels;

    public function __construct() {
        $this->deleteGamesViews = new DeleteGamesViews();
        $this->deleteGamesModels = new DeleteGamesModels();
    }

    public function listGamesDelete() {
        $games = $this->deleteGamesModels->listeDelete();
        $this->deleteGamesViews->listDeleteGames($games);
    }

    public function deleteGame($gameId) {
        $success = $this->deleteGamesModels->deleteGame($gameId);
        if ($success) {
            echo "Reussite de la suppression.";
            exit();
        } else {
            echo "Échec de la suppression.";
        }
    }
}
<?php
namespace Controllers;

use Views\ModifyGamesViews;
use Models\ModifyGamesModels;

class ModifyGamesController {
    protected $modifyGamesViews;
    protected $modifyGamesModels;

    public function __construct() {
        $this->modifyGamesViews = new ModifyGamesViews();
        $this->modifyGamesModels = new ModifyGamesModels();
    }

    public function modifyGames() {
        $id = $_GET['id'] ?? null; 
        if ($id) {
        $games = $this->modifyGamesModels->modify($id);
        $this->modifyGamesViews->updateForm($games);
        } else {
            echo 'Modification non enregistrée';
        }
    }
    public function updateGames() {
        $this->modifyGamesModels->update();
    }
}

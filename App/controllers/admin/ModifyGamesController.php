<?php

namespace AdminControllers;

use AdminViews\ModifyGamesViews;
use AdminModels\ModifyGamesModels;

class ModifyGamesController {
    protected $modifyGamesViews;
    protected $modifyGamesModels;

    public function __construct() {
        $this->modifyGamesViews = new ModifyGamesViews();
        $this->modifyGamesModels = new ModifyGamesModels();
    }

    public function modifyGamesController() {
        $id = $_GET['id'] ?? null; 
        if ($id) {
            $modify = $this->modifyGamesModels->modifyGamesModels($id);
            $this->modifyGamesViews->FormModifyViews($modify);
        } else {
            echo 'Modification non enregistrée';
        }
    }
    public function updateGamesController() {
        $this->modifyGamesModels->updateModels();
    }
}

<?php

namespace AdminControllers;

use AdminViews\ModifyCharacterViews;
use AdminModels\ModifyCharacterModels;

class ModifyCharacterController {
    protected $modifyCharacterViews;
    protected $modifyCharacterModels;

    public function __construct() {
        $this->modifyCharacterViews = new ModifyCharacterViews(); 
        $this->modifyCharacterModels = new ModifyCharacterModels();
    }

    public function modifyCharacter() {
        $characterId = $_GET['characterId'] ?? null; 
        if ($characterId) {
            $character = $this->modifyCharacterModels->modify($characterId);
            $this->modifyCharacterViews->updateForm($character);
        } else {
            echo 'Modification non enregistrée';
        }
    }
    public function updateGames() {
        $this->modifyCharacterModels->update();
    }
}
   

<?php

namespace AdminControllers;

use AdminViews\ListModifyCharacterViews;
use AdminModels\ListModifyCharacterModels;

class ListModifyCharacterController {
    protected $listModifyCharacterViews;
    protected $listModifyCharacterModels;

    public function __construct() {
        $this->listModifyCharacterViews = new ListModifyCharacterViews();
        $this->listModifyCharacterModels = new ListModifyCharacterModels();
    } 

    public function listModifyCharacter() {
        $games = $this->listModifyCharacterModels->listModify();
        $this->listModifyCharacterViews->listModifyCharacter($games);
    }
}
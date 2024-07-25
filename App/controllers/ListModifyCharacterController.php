<?php

namespace Controllers;

use Views\ListModifyCharacterViews;
use Models\ListModifyCharacterModels;

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
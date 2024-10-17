<?php

namespace AdminControllers;

use AdminViews\ListDeleteCharacterViews;
use AdminModels\ListDeleteCharacterModels;

class ListDeleteCharacterController {
    protected $listDeleteCharacterViews;
    protected $listDeleteCharacterModels;

    public function __construct() {
        $this->listDeleteCharacterViews = new ListDeleteCharacterViews();
        $this->listDeleteCharacterModels = new ListDeleteCharacterModels();
    } 

    public function listDeleteCharacter() {
        $games = $this->listDeleteCharacterModels->listDelete();
        $this->listDeleteCharacterViews->listDeleteCharacter($games);
    }
}
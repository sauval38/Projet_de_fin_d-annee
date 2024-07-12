<?php
namespace Controllers;

use Views\CharacterViews;

class CharacterController {
    protected $characterViews;

    public function __construct() {
        $this->characterViews = new CharacterViews();
    }

    public function character() {
            $this->characterViews->characterViews();
    }    
}

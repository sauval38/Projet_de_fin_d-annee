<?php
namespace Controllers;

use Views\CharacterViews;
use Models\CharacterModels;

class CharacterController {
    protected $characterViews;
    protected $characterModels;

    public function __construct() {
        $this->characterViews = new CharacterViews();
        $this->characterModels = new CharacterModels();
    }
    public function character() {
        $id = $_GET['id'] ?? null; 
        if ($id) {
            $game = $this->characterModels->listCharacter($id);
            $this->characterViews->characterViews($game);

        } else {
            echo 'Personnage de jeu non fourni';
        }
    }
}

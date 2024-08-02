<?php

namespace Controllers;

use Views\ListCharacterViews;
use Models\ListCharacterModels;

class ListCharacterController {
    protected $listCharacterViews;
    protected $listCharacterModels;

    public function __construct() {
        $this->listCharacterViews = new ListCharacterViews();
        $this->listCharacterModels = new ListCharacterModels();
    } 

    public function listModifyCharacter($id) {
        $id = $_GET['id'] ?? null; 
        if ($id) {
            $characters = $this->listCharacterModels->listModify($id);
            $this->listCharacterViews->listCharacter($characters);
        } else {
            echo 'Affichage inexistant';
        }
    }
}
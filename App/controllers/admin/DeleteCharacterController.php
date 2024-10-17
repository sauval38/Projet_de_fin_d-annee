<?php

namespace AdminControllers;

use AdminViews\DeleteCharacterViews;
use AdminModels\DeleteCharacterModels;

class DeleteCharacterController {
    protected $deleteCharacterViews;
    protected $deleteCharacterModels;

    public function __construct() {
        $this->deleteCharacterViews = new DeleteCharacterViews();
        $this->deleteCharacterModels = new DeleteCharacterModels();
    }

    public function listCharacterDelete($game_id) {
        $game_id = $_GET['gameId'] ?? null;
        if ($game_id){
            $games = $this->deleteCharacterModels->listDelete($game_id);
            $this->deleteCharacterViews->listDeleteGames($games);
        } else {
            echo 'NON GAME ID';
        }
        
    }

    public function deleteCharacter() {
        $characterId = $_POST['character_id'];
        $success = $this->deleteCharacterModels->deleteCharacter($characterId);
        if ($success) {
            echo "Reussite de la suppression.";
        } else {
            echo "Échec de la suppression.";
        }
    }
}
<?php

namespace AdminControllers;

use AdminViews\DeleteBossViews;
use AdminModels\DeleteBossModels;

class DeleteBossController {
    protected $deleteBossViews;
    protected $deleteBossModels;

    public function __construct() {
        $this->deleteBossViews = new DeleteBossViews();
        $this->deleteBossModels = new DeleteBossModels();
    }

    public function listBossDelete($game_id) {
        $game_id = $_GET['gameId'] ?? null;
        if ($game_id){
            $games = $this->deleteBossModels->listDelete($game_id);
            $this->deleteBossViews->listDeleteBoss($games);
        } else {
            echo 'NON GAME ID';
        }
        
    }

    public function deleteBoss() {
        $bossId = $_POST['boss_id'];
        $success = $this->deleteBossModels->deleteBoss($bossId);
        if ($success) {
            echo "Reussite de la suppression.";
        } else {
            echo "Échec de la suppression.";
        }
    }
}
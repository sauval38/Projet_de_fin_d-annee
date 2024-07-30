<?php
namespace Controllers;

use Views\BossViews;
use Models\BossModels;

class BossController {
    protected $bossViews;
    protected $bossModels;

    public function __construct() {
        $this->bossViews = new BossViews();
        $this->bossModels = new BossModels();
    }

    public function boss() {
        $id = $_GET['id'] ?? null; 
        if ($id) {
            $game = $this->bossModels->listBoss($id);
            $this->bossViews->bossViews($game);
        } else {
            echo 'ID de jeu non fourni';
        }
    }
}
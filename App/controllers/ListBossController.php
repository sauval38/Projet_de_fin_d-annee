<?php

namespace Controllers;

use Views\ListBossViews;
use Models\ListBossModels;

class ListBossController {
    protected $listBossViews;
    protected $listBossModels;

    public function __construct() {
        $this->listBossViews = new ListBossViews();
        $this->listBossModels = new ListBossModels();
    } 

    public function listModifyBoss($id) {
        $id = $_GET['id'] ?? null; 
        if ($id) {
            $boss = $this->listBossModels->listModify($id);
            $this->listBossViews->listCharacter($boss);
        } else {
            echo 'Affichage inexistant';
        }
    }
}
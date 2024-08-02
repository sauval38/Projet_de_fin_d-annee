<?php

namespace Controllers;

use Views\ModifyBossViews;
use Models\ModifyBossModels;

class ModifyBossController {
    protected $modifyBossViews;
    protected $modifyBossModels;

    public function __construct() {
        $this->modifyBossViews = new ModifyBossViews(); 
        $this->modifyBossModels = new ModifyBossModels();
    }

    public function modifyBossController() {
        $bossId = $_GET['bossId'] ?? null;
        if ($bossId) {
            $boss = $this->modifyBossModels->modify($bossId);
            $this->modifyBossViews->updateForm($boss);
        } else {
            echo 'Modification non enregistrée';
        }
    }
    public function updateBossController() {
        $this->modifyBossModels->update();
    }
}
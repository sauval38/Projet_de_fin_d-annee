<?php

namespace AdminControllers;

use AdminViews\ListModifyBossViews;
use AdminModels\ListModifyBossModels;

class ListModifyBossController {
    protected $listModifyBossViews;
    protected $listModifyBossModels;

    public function __construct() {
    $this->listModifyBossViews = new ListModifyBossViews();
    $this->listModifyBossModels = new ListModifyBossModels();
    }

    public function listModifyBoss() {
        $games = $this->listModifyBossModels->listModify();
        $this->listModifyBossViews->listModifyBoss($games);
    }
}
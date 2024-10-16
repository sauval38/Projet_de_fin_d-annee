<?php

namespace AdminControllers;

use AdminViews\ListDeleteBossViews;
use AdminModels\ListDeleteBossModels;

class ListDeleteBossController {
    protected $listDeleteBossViews;
    protected $listDeleteBossModels;

    public function __construct() {
        $this->listDeleteBossViews = new ListDeleteBossViews();
        $this->listDeleteBossModels = new ListDeleteBossModels();
    } 

    public function listBossCharacter() {
        $games = $this->listDeleteBossModels->listDelete();
        $this->listDeleteBossViews->listDeleteBoss($games);
    }
}
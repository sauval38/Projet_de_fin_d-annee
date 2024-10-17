<?php

namespace AdminModels;

use App\Database;

class ListDeleteBossModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listDelete() {
        $sqlListDeleteBoss = "SELECT * FROM games";
        $listDeleteBoss = $this->db->prepare($sqlListDeleteBoss);
        $listDeleteBoss->execute();
        return $listDeleteBoss->fetchAll();
    }
}
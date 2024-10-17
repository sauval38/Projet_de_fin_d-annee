<?php

namespace AdminModels;

use App\Database;

class ListModifyBossModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listModify() {
        $sqlListModifyBoss = "SELECT * FROM games";
        $listModifyBoss = $this->db->prepare($sqlListModifyBoss);
        $listModifyBoss->execute();
        return $listModifyBoss->fetchAll();
    }
}
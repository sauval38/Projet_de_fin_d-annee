<?php

namespace Models;

use App\Database;

class ListBossModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listModify($id) {
        $sqlListBoss = "SELECT * FROM boss WHERE games_id = ?";
        $listBoss = $this->db->prepare($sqlListBoss);
        $listBoss->execute([$id]);
        return $listBoss->fetchAll();
    }
}
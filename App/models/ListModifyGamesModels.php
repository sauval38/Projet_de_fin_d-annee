<?php
namespace Models;

use App\Database;

class ListModifyGamesModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listModifyGame() {
        $sqlListModify = "SELECT * FROM games";
        $listModify = $this->db->prepare($sqlListModify);
        $listModify->execute();
        return $listModify->fetchAll();
    }
} 
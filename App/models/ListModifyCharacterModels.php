<?php

namespace Models;

use App\Database;

class ListModifyCharacterModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listModify() {
        $sqlListModifyCharacter = "SELECT * FROM games";
        $listModifyCharacter = $this->db->prepare($sqlListModifyCharacter);
        $listModifyCharacter->execute();
        return $listModifyCharacter->fetchAll();
    }
}
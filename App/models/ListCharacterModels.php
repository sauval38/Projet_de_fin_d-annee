<?php

namespace Models;

use App\Database;

class ListCharacterModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listModify($id) {
        $sqlListCharacter = "SELECT * FROM `character` WHERE games_id = ?";
        $listCharacter = $this->db->prepare($sqlListCharacter);
        $listCharacter->execute([$id]);
        return $listCharacter->fetchAll();
    }
}
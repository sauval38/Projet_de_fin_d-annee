<?php

namespace Models;

use App\Database;

class ListDeleteCharacterModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function listDelete() {
        $sqlListDeleteCharacter = "SELECT * FROM games";
        $listDeleteCharacter = $this->db->prepare($sqlListDeleteCharacter);
        $listDeleteCharacter->execute();
        return $listDeleteCharacter->fetchAll();
    }
}
<?php
namespace Models;

use App\Database;

class ListModifyGamesModels {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function listModifyGame() {
        $sqlArticle = "SELECT * FROM games";
        $query = $this->db->getConnection()->prepare($sqlArticle);
        $query->execute();
        return $query->fetchAll();
    }
} 
<?php
namespace Models;

use App\Database;

class ListGamesModels {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function gameList() {
        $sqlArticle = "SELECT * FROM games";
        $query = $this->db->getConnection()->prepare($sqlArticle);
        $query->execute();
        return $query->fetchAll();
    }
} 
   
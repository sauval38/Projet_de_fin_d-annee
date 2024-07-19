<?php
namespace Models;

use App\Database;

class ListGamesModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function gameList() {
        $sqlListGames = "SELECT * FROM games";
        $listGames = $this->db->prepare($sqlListGames);
        $listGames->execute();
        return $listGames->fetchAll();
    }
} 
   
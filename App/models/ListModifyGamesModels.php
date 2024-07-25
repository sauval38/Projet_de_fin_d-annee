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
        $sqlListModifyGames = "SELECT * FROM games";
        $listModifyGames = $this->db->prepare($sqlListModifyGames);
        $listModifyGames->execute();
        return $listModifyGames->fetchAll();
    }
} 
<?php
namespace Models;

use App\Database;

class GamesModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function games($id) {
        $sqlGames = "SELECT * FROM games WHERE id = ?";
        $games = $this->db->prepare($sqlGames);
        $games->execute([$id]);
        return $games->fetch();  
    }
}
<?php
namespace Models;

use App\Database;

class GamesModels {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }
    
    public function games($id) {
        $sqlArticle = "SELECT * FROM games WHERE id = ?";
        $query = $this->db->getConnection()->prepare($sqlArticle);
        $query->execute([$id]);
        return $query->fetch();  
    }
}
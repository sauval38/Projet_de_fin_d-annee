<?php
namespace Models;

use App\Database;
use Exception;

class GamesModels {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }

    public function gameList() {
        $sqlArticle = "SELECT title_article, description_article, image_article, path FROM games";
        $query = $this->db->getConnection()->prepare($sqlArticle);
        $query->execute();
        return $query->fetchAll();
    }
} 
   
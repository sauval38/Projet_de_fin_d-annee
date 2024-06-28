<?php
namespace Models;

use App\Database;
use Exception;

class GamesModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }

    public function gameList() {
        $sqlArticle = "SELECT title_article, description_article, path FROM games;";
    }
} 
   
<?php
namespace Models;

use App\Database;

class StoryModels {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }
    
    public function storyViews($id) {
        $sqlArticle = "SELECT titles_article, images_article, story_article, path FROM games WHERE id = ?";
        $query = $this->db->getConnection()->prepare($sqlArticle);
        $query->execute([$id]);
        return $query->fetch();  
    }
}
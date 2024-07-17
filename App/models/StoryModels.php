<?php
namespace Models;

use App\Database;

class StoryModels {
    protected $db;

    public function __construct() {
        $this->db = new Database();
    }
    
    public function storyViews($id) {
        $sqlStory = "SELECT titles_article, images_article, story_article, path FROM games WHERE id = ?";
        $story = $this->db->getConnection()->prepare($sqlStory);
        $story->execute([$id]);
        return $story->fetch();  
    }
}
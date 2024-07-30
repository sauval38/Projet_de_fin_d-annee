<?php
namespace Models;

use App\Database;

class StoryModels {
    protected $db;

    public function __construct() {
        $database = new Database();
        $this->db = $database->getConnection();
    }
    
    public function storyModels($id) {
        $sqlStory = "SELECT titles_article, images_article, story_article, path FROM games WHERE id = ?";
        $story = $this->db->prepare($sqlStory);
        $story->execute([$id]);
        return $story->fetch();  
    }
}
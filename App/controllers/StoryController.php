<?php
namespace Controllers;

use Views\StoryViews;
use Models\StoryModels;

class StoryController {
    protected $storyViews;
    protected $storyModels;

    public function __construct() {
        $this->storyViews = new StoryViews();
        $this->storyModels = new StoryModels();
    }

    public function storyController() {
        $id = $_GET['id'] ?? null; 
        if ($id) {
            $story = $this->storyModels->storyModels($id);
            $this->storyViews->storyView($story);
        } else {
            echo 'ID de jeu non fourni';
        }
    }
}

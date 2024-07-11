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

    public function story() {
        $id = $_GET['id'] ?? null; 
        if ($id) {
            $game = $this->storyModels->storyViews($id);
            $this->storyViews->storyForm($game);
        } else {
            echo 'ID de jeu non fourni';
        }
    }
}

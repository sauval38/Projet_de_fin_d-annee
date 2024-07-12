<?php

namespace Views;

class StoryViews {
    
    public function storyForm($game) {
        if (!isset($game)) {
            return; 
        }
        
        $title = htmlspecialchars($game['titles_article']);
        $image = htmlspecialchars($game['path'] . '/' . $game['images_article']);
        $story = htmlspecialchars($game['story_article']);
        
        ?>
        <div class="story-game">
            <h1><?= $title ?></h1>
            <div class="story">
                <img src="<?= $image ?>" alt="carousel <?= $title ?>">
                <p><?= $story ?></p>
            </div>
        </div>
        <?php
    }
}
?>
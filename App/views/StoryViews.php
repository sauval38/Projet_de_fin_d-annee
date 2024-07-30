<?php

namespace Views;

class StoryViews {
    
    public function storyView($story) {
        if (!isset($story)) {
            return; 
        }
        
        $title = htmlspecialchars($story['titles_article']);
        $image = htmlspecialchars($story['path'] . '/' . $story['images_article']);
        $story = ($story['story_article']); 
        
        ?>
        <div id="story-game">
        <a href="listgames" class="close-button">&times;</a>
            <h1><?= $title ?></h1>
            <div class="story">
                <img src="<?= $image ?>" alt="story <?= $title ?>">
                <?php
                
                $paragraphs = explode('<br />', $story);
                
                foreach ($paragraphs as $paragraph) {
                    if (!empty(trim($paragraph))) {
                        ?>
                        <p><?= $paragraph ?></p>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <?php
    }
}
?> 
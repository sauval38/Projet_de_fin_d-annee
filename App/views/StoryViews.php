<?php

namespace Views;

class StoryViews {
    
    public function storyForm($game) {
        if (!isset($game)) {
            return; 
        }
        
        $title = htmlspecialchars($game['titles_article']);
        $image = htmlspecialchars($game['path'] . '/' . $game['images_article']);
        $story = ($game['story_article']); 
        
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
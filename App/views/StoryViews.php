<?php

namespace Views;

class StoryViews {
    public function storyForm($game) {
        if (isset($game)) {
        echo '<div class="story-game">';
            echo '<h1>' . htmlspecialchars($game['titles_article']) . '</h1>';
            echo '<div class="story">';
            echo '<img src="' . htmlspecialchars($game['path'] . '/' . $game['images_article']) . '" alt="' . htmlspecialchars($game['titles_article']) . '">';
            echo '<p>' . htmlspecialchars($game['story_article']) . '</p>';
            echo '</div>';
        }    
    }
}
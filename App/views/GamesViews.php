<?php

namespace Views;

class GamesViews {
    public function displayGame($game) {
        if (isset($game)) {
            echo '<div class="game-details">';
            echo '<h1>' . htmlspecialchars($game['titles_article']) . '</h1>';
            echo '<div class="game-image">';
            echo '<img src="' . htmlspecialchars($game['path'] . '/' . $game['images_article']) . '" alt="' . htmlspecialchars($game['titles_article']) . '">';
            echo '</div>';
            echo '<div class="game-info">';
            
            echo '<div class="info-item">';
            echo '<p><strong>Descriptions:</strong><br>' . htmlspecialchars($game['descriptions_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong>Histoires</strong><br>' . htmlspecialchars($game['story_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong>Plates-formes:</strong><br>' . htmlspecialchars($game['platforms_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong>Modes:</strong><br>' . htmlspecialchars($game['modes_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong>Genres:</strong><br>' . htmlspecialchars($game['genres_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong>Concepteurs:</strong><br>' . htmlspecialchars($game['designers_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong>Développeurs:</strong><br>' . htmlspecialchars($game['developers_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong>Éditeurs:</strong><br>' . htmlspecialchars($game['editors_article']) . '</p>';
            echo '</div>';

            echo '<div class="info-item">';
            echo '<p><strong>Gameplay:</strong><br>' . htmlspecialchars($game['gameplay_article']) . '</p>';
            echo '</div>';

            echo '<div class="info-item">';
            echo '<p><strong>Graphismes:</strong><br>' . htmlspecialchars($game['graphics_article']) . '</p>';
            echo '</div>';

            echo '<div class="info-item">';
            echo '<p><strong>Bande-son:</strong><br>' . htmlspecialchars($game['soundtrack_article']) . '</p>';
            echo '</div>';
            
            echo '</div>'; 
            echo '</div>'; 
        } else {
            echo '<h1>Information non trouvée</h1>';
        }
    }
}

?>

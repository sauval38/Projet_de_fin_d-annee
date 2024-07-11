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
            echo '<p><strong class="description-title">Descriptions:</strong><br>' . htmlspecialchars($game['descriptions_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong class="description-title">Plates-formes:</strong><br>' . htmlspecialchars($game['platforms_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong class="description-title">Modes:</strong><br>' . htmlspecialchars($game['modes_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong class="description-title">Genres:</strong><br>' . htmlspecialchars($game['genres_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong class="description-title">Concepteurs:</strong><br>' . htmlspecialchars($game['designers_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong class="description-title">Développeurs:</strong><br>' . htmlspecialchars($game['developers_article']) . '</p>';
            echo '</div>';
            
            echo '<div class="info-item">';
            echo '<p><strong class="description-title">Éditeurs:</strong><br>' . htmlspecialchars($game['editors_article']) . '</p>';
            echo '</div>';

            echo '<div class="info-item">';
            echo '<p><strong class="description-title">Gameplay:</strong><br>' . htmlspecialchars($game['gameplay_article']) . '</p>';
            echo '</div>';

            echo '<div class="info-item">';
            echo '<p><strong class="description-title">informations supplémentaires:</strong><br>' . htmlspecialchars($game['informations_article']) . '</p>';
            echo '</div>';
            
            echo '</div>'; 
            echo '</div>'; 
        } else {
            echo '<h1>Informations non trouvée</h1>';
        }
    }
}

?>

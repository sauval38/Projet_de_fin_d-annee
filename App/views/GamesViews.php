<?php

namespace Views;

class GamesViews {
    public function displayGame($game) {
        if (isset($game)) {
            ?>
            <div class="game-details">
                <h1><?= htmlspecialchars($game['titles_article']) ?></h1>
                <div class="game-image">
                    <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_article']) ?>" alt="<?= htmlspecialchars($game['titles_article']) ?>">
                </div>
                <div class="game-info">
                    <?php foreach (['descriptions_article', 'platforms_article', 'modes_article', 'genres_article', 'designers_article', 'developers_article', 'editors_article', 'gameplay_article', 'informations_article'] as $field): ?>
                        <div class="info-item">
                            <p><strong class="description-title"><?= ucfirst(str_replace("_", " ", $field)) ?>:</strong><br><?= htmlspecialchars($game[$field]) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
        } else {
            echo '<h1>Informations non trouvées</h1>';
        }
    }
}

?>
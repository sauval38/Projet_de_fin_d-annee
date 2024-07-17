<?php

namespace Views;

class GamesViews {
    public function displayGame($game) {
        if (isset($game)) {
            // Tableau associatif pour mapper les clés aux noms des colonnes
            $fields = [
                'descriptions_article' => 'Description',
                'platforms_article' => 'Platforms',
                'modes_article' => 'Modes',
                'genres_article' => 'Genres',
                'designers_article' => 'Designers',
                'developers_article' => 'Developers',
                'editors_article' => 'Editors',
                'gameplay_article' => 'Gameplay',
                'informations_article' => 'Informations'
            ];
            ?>
            <div class="game-details">
                <h1><?= htmlspecialchars($game['titles_article']) ?></h1>
                <div class="game-image">
                    <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_article']) ?>" alt="<?= htmlspecialchars($game['titles_article']) ?>">
                </div>
                <div class="game-info">
                    <?php foreach ($fields as $field => $label): ?>
                        <div class="info-item">
                            <p><strong class="description-title"><?= htmlspecialchars($label) ?>:</strong><br><?= nl2br(htmlspecialchars($game[$field])) ?></p>
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
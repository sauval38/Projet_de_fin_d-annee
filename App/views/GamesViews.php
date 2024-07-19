<?php

namespace Views;

class GamesViews {
    public function displayGame($game) {
        if (isset($game)) {
            $fields = [
                'descriptions_article' => 'Description',
                'gameplay_article' => 'Gameplay',
                'modes_article' => 'Modes',
                'genres_article' => 'Genres',
                'designers_article' => 'Créateurs',
                'developers_article' => 'Développeurs',
                'editors_article' => 'Editeurs',
                'platforms_article' => 'Plateformes',
                'gameplay_article' => 'Gameplay',
                'informations_article' => 'Informations'
            ];
            ?>
            <div id="games-detail">
                <a href="listgames" class="close-button">&times;</a>
                <h1><?= htmlspecialchars($game['titles_article']) ?></h1>
                <div class="games-image">
                    <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_article']) ?>" alt="games<?= htmlspecialchars($game['titles_article']) ?>">
                </div>
                <div class="games-info">
                    <?php foreach ($fields as $field => $label): ?>
                        <div class="games-item">
                            <p><strong class="description-title"><?= htmlspecialchars($label) ?>:</strong><br><?= (htmlspecialchars($game[$field])) ?></p>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>
            <?php
        } else {
            ?>
            <h1>Informations non trouvées</h1>
            <?php
        }
    }
}
?>
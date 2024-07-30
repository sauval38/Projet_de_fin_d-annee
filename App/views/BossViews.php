<?php

namespace Views;

class BossViews {
    public function bossViews($game) {
        if (isset($game) && is_array($game) && !empty($game)) {
            ?>
            <h1><?= htmlspecialchars($game[0]['titles_article']) ?></h1>
            <div id="game-boss-detail">
                <a href="listgames" class="close-button">&times;</a>
                <div class="game-character-grid">
                    <?php 
                    $boss = [
                        'names_boss' => 'Name',
                        'descriptions_boss' => 'Descriptions',
                        'HP_boss' => 'HP',
                        'MP_boss' => 'MP',
                        'loots_boss' => 'Butins',
                        'weakness_boss' => 'Weakness',
                        'location_boss' => 'Location',
                        'gils_boss' => 'Gils',
                        'experiences_boss' => 'Experiences',
                    ];
                    foreach ($game as $item): 
                        ?>
                        <div class="game-character-block">
                            <div class="game-character-image">
                                <?php if (isset($item['path']) && isset($item['images_boss'])): ?>
                                    <img src="<?= htmlspecialchars($item['path'] . '/' . $item['images_boss']) ?>" alt="boss<?= htmlspecialchars($item['titles_article']) ?>">
                                <?php endif; ?>
                            </div>
                            <div class="game-character-info">
                                <?php 
                                foreach ($boss as $key => $label) {
                                    if (!empty($item[$key])) {
                                        ?>
                                        <div class="game-character-item">
                                            <p><strong class="description-title"><?= htmlspecialchars($label) ?>:</strong><br><?= nl2br(htmlspecialchars($item[$key])) ?></p>
                                        </div>
                                        <?php
                                    }
                                } 
                                ?>
                            </div>
                        </div>
                    <?php 
                    endforeach;
                    ?>
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
  
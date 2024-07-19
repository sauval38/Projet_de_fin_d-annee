<?php

namespace Views;

class CharacterViews {
    public function characterViews($game) {
        if (isset($game) && is_array($game) && !empty($game)) { 
            ?>
            <h1><?= htmlspecialchars($game[0]['titles_article']) ?></h1>
            <div id="game-character-detail">
            <a href="listgames" class="close-button">&times;</a>
                <div class="game-character-grid">
                    <?php 
                    $fields = [
                        'names_character' => 'Name',
                        'descriptions_character' => 'Description',
                        'jobs_character' => 'Job',
                        'limits_break_character' => 'Limit Break',
                        'age_character' => 'Age',
                        'armed_character' => 'Armed',
                        'size_character' => 'Size',
                        'date_o_birth_character' => 'Date of Birth',
                        'place_of_birth_character' => 'Place of Birth'
                    ];
                    foreach ($game as $item): 
                        ?>
                        <div class="game-character-block">
                            <div class="game-character-image">
                                <?php if (isset($item['path']) && isset($item['images_character'])): ?>
                                    <img src="<?= htmlspecialchars($item['path'] . '/' . $item['images_character']) ?>" alt="character<?= htmlspecialchars($item['titles_article']) ?>">
                                <?php endif; ?>
                            </div>
                            <div class="game-character-info">
                                <?php 
                                foreach ($fields as $key => $label) {
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
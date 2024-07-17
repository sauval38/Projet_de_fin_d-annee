<?php

namespace Views;

class CharacterViews {
    public function characterViews($game) {
        if (isset($game) && is_array($game) && !empty($game)) { 
            ?>
                <h1><?= htmlspecialchars($game[0]['titles_article']) ?></h1>
                <div class="game-characters">
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
                            <div class="game-details">
                                <div class="game-info">
                                    <div class="game-image">
                                        <?php if (isset($item['path']) && isset($item['images_character'])): ?>
                                            <img src="<?= htmlspecialchars($item['path'] . '/' . htmlspecialchars($item['images_character'])) ?>" alt="<?= htmlspecialchars($item['titles_article']) ?>">
                                        <?php endif; ?>
                                    </div>
                                    <div class="info-item">
                                    <?php 
                                    foreach ($fields as $key => $label) {
                                        // Vérification et affichage des détails
                                        if (!empty($item[$key])) {
                                            echo '<p><strong class="description-title">' . htmlspecialchars($label) . ':</strong><br>' . nl2br(htmlspecialchars($item[$key])) . '</p>';
                                        }                            
                                    } 
                                    ?>
                                </div>
                            </div>
                            </div>
                        <?php 
                        endforeach;
                        ?>
                </div>
            </div>
            <?php
        } else {
            echo '<h1>Informations non trouvées</h1>';
        }
    }
}
?>  
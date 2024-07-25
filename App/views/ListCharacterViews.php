<?php

namespace Views;

class ListCharacterViews {

    public function listCharacter($characters) {
        ?>
        <h1>LISTE DES PERSONNAGES</h1>
        <div id="list-character">
            <?php foreach ($characters as $character): ?>
                <div class="list">
                    <a href="admin/modifyCharacter/<?= htmlspecialchars($character['games_id']) ?>/<?= htmlspecialchars($character['id']) ?>">
                        <?= htmlspecialchars($character['names_character']) ?>
                    </a>
                    <img src="<?= htmlspecialchars($character['path'] . '/' . $character['images_character']) ?>" alt="character<?= htmlspecialchars($character['names_character']) ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}

?>
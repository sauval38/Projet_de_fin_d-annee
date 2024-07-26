<?php

namespace Views;

class ListDeleteCharacterViews {

public function listDeleteCharacter($games) {
    ?>
    <h1>LISTE DES JEUX</h1>
    <div id="list-delete-character-admin">
        <?php foreach ($games as $game): ?>
            <div class="list">
                <a href="admin/deleteCharacter/<?= htmlspecialchars($game['id']) ?>">
                    <?= htmlspecialchars($game['titles_article']) ?>
                </a>
                <p><?= htmlspecialchars($game['descriptions_article']) ?></p>
                <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_article']) ?>" alt="games<?= htmlspecialchars($game['titles_article']) ?>">
            </div>
        <?php endforeach; ?>
    </div>
    <?php
}
}

?>
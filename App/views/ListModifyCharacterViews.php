<?php

namespace Views;

class ListModifyCharacterViews {

    public function listModifyCharacter($games) {
        ?>
        <h1>LISTE DES JEUX</h1>
        <div id="list-modify-character-admin">
            <?php foreach ($games as $game): ?>
                <div class="list">
                    <a href="admin/modifyCharacter/<?= htmlspecialchars($game['id']) ?>">
                        <?= htmlspecialchars($game['titles_article']) ?>
                    </a>
                    <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_article']) ?>" alt="games<?= htmlspecialchars($game['titles_article']) ?>">
                    <p><?= htmlspecialchars($game['descriptions_article']) ?></p>
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}

?>
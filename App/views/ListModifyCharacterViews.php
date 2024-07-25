<?php

namespace Views;

class ListModifyCharacterViews {

    public function listModifyCharacter($games) {
        ?>
        <h1>LISTE DES JEUX</h1>
        <div id="list-modify-character">
            <?php foreach ($games as $game): ?>
                <div class="list-character">
                    <a href="admin/modifyCharacter/<?= htmlspecialchars($game['id']) ?>">
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
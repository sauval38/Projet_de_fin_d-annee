<?php

namespace Views;

class ListModifyBossViews {
     
    public function listModifyBoss($games) {
        ?>
        <h1>LISTE DES JEUX</h1>
        <div id="list-modify-boss-admin">
        <?php foreach ($games as $game): ?>
                <div class="list">
                    <a href="admin/modifyBoss/<?= htmlspecialchars($game['id']) ?>">
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
    
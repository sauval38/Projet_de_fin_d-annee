<?php

namespace Views;

class ListBossViews {

    public function listCharacter($boss) {
        ?>
        <h1>LISTE DES BOSS</h1>
        <div id="list-boss-admin">
            <?php foreach ($boss as $boss): ?>
                <div class="list">
                    <a href="admin/modifyBoss/<?= htmlspecialchars($boss['games_id']) ?>/<?= htmlspecialchars($boss['id']) ?>">
                        <?= htmlspecialchars($boss['name_boss']) ?>
                    </a>
                    <img src="<?= htmlspecialchars($boss['path'] . '/' . $boss['images_boss']) ?>" alt="boss<?= htmlspecialchars($boss['name_boss']) ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}

?>

<?php

namespace Views;

class DeleteBossViews {

    public function listDeleteBoss($games) {
        ?>
        <h1>LISTE DES BOSS</h1>
        <div id="delete-boss">
            <?php if (!empty($games)): ?>
                <?php foreach ($games as $game): ?>
                    <div class="list">
                        <h2 class="delete-title">
                            <?= htmlspecialchars($game['name_boss']) ?>
                        </h2>
                        <img src="<?= ($game['path'] . '/' . $game['images_boss']) ?>" alt="boss<?= htmlspecialchars($game['name_boss']) ?>">
                        <div class="button-container">
                            <form method="POST">
                                <input type="hidden" name="boss_id" value="<?= htmlspecialchars($game['id']) ?>">
                                <button type="submit" name="delete">Supprimer</button>
                            </form>
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php else: ?>
                <h1>Information non trouvée</h1>
            <?php endif; ?>
        </div>
        <?php
    }
}
?>

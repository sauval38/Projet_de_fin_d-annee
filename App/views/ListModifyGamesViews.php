<?php

namespace Views;

class ListModifyGamesViews {
    
    public function listmodify($games) {
        ?>
        <h1>LISTE DES JEUX</h1>
        <div class="games-container">
            <?php foreach ($games as $game): ?>
                <div class="game-card">
                    <a href="admin/modifierunjeux/<?= htmlspecialchars($game['id']) ?>">
                        <?= htmlspecialchars($game['titles_article']) ?>
                    </a>
                    <p><?= htmlspecialchars($game['descriptions_article']) ?></p>
                    <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_article']) ?>" alt="<?= htmlspecialchars($game['titles_article']) ?>">
                </div>
            <?php endforeach; ?>
        </div>
        <?php
    }
}

?>
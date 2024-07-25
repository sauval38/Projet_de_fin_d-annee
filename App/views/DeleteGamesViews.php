<?php

namespace Views;

class DeleteGamesViews {

    public function listDeleteGames($games) {
        ?>
        <h1>LISTE DES JEUX</h1>
        <div id="list-delete">
            <?php if (!empty($games)): ?>
                <?php foreach ($games as $game): ?>
                    <div class="list">
                        <h2 class="delete-title">
                            <?= htmlspecialchars($game['titles_article']) ?>
                        </h2>
                        <p><?= htmlspecialchars($game['descriptions_article']) ?></p>
                        <img src="<?= ($game['path'] . '/' . $game['images_article']) ?>" alt="image<?= htmlspecialchars($game['titles_article']) ?>">
                        
                        <div class="button-container">
                            <form method="POST">
                                <input type="hidden" name="game_id" value="<?= htmlspecialchars($game['id']) ?>">
                                <button type="submit" name="delete" value="1">Supprimer</button>
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

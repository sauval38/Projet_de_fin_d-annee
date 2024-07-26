<?php

namespace Views;

class DeleteCharacterViews {

    public function listDeleteGames($games) {
        ?>
        <h1>LISTE DES JEUX</h1>
        <div id="delete">
            <?php if (!empty($games)): ?>
                <?php foreach ($games as $game): ?>
                    <div class="list">
                        <h2 class="delete-title">
                            <?= htmlspecialchars($game['names_character']) ?>
                        </h2>
                        <img src="<?= ($game['path'] . '/' . $game['images_character']) ?>" alt="image<?= htmlspecialchars($game['names_character']) ?>">
                        <div class="button-container">
                            <form method="POST">
                                <input type="hidden" name="character_id" value="<?= htmlspecialchars($game['id']) ?>">
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

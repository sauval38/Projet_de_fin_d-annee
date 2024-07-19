<?php

namespace Views;

class ListGamesViews {
    
    public function list($games) {
        ?>
        <h1>LISTE DES JEUX</h1>
        <div id="list-games">
            <?php foreach ($games as $game): ?>
                <div class="list">
                    <h2 class="game-title" data-game-id="<?= htmlspecialchars($game['id']) ?>">
                        <?= htmlspecialchars($game['titles_article']) ?>
                    </h2>
                    <div class="additional-links" id="links-<?= htmlspecialchars($game['id']) ?>" style="display:none;">
                        <a href="games/<?= htmlspecialchars($game['id']) ?>">Informations</a>
                        <a href="story/<?= htmlspecialchars($game['id']) ?>">Histoire</a>
                        <a href="character/<?= htmlspecialchars($game['id']) ?>">Personnage</a>
                        <a href="<?= htmlspecialchars($game['id']) ?>">Boss</a>
                    </div>
                    <p><?= htmlspecialchars($game['descriptions_article']) ?></p>
                    <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_article']) ?>" alt="image<?= htmlspecialchars($game['titles_article']) ?>">
                </div>
            <?php endforeach;
                if (empty($game)) {
                    echo '<h1>Information non trouvée</h1>';
                }
             ?>
        </div>
        <script src="./assets/js/games.js"></script>
        <?php
        
    }
}

?>
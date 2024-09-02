<?php

namespace Views;

// Déclaration de la classe ListGamesViews dans l'espace de noms Views
class ListGamesViews {

    // Méthode pour afficher la liste des jeux
    public function list($games) {
        // Début de la génération du contenu HTML pour la liste des jeux
        ?>
        <h1>LISTE DES JEUX</h1> <!-- Titre principal pour la liste des jeux -->
        <div id="list-games"> <!-- Conteneur principal pour la liste des jeux -->
            <?php foreach ($games as $game): ?> <!-- Boucle à travers chaque élément de la liste des jeux -->
                <div class="list"> <!-- Conteneur pour chaque jeu individuel -->
                    <!-- Titre du jeu, avec un attribut data contenant l'ID du jeu -->
                    <h2 class="game-title" data-game-id="<?= htmlspecialchars($game['id']) ?>">
                        <?= htmlspecialchars($game['titles_article']) ?> <!-- Titre du jeu affiché -->
                    </h2>
                    <!-- Image du jeu -->
                    <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_article']) ?>" alt="image<?= htmlspecialchars($game['titles_article']) ?>"> <!-- Attribut alt pour l'image du jeu -->
                    <!-- Conteneur pour les liens supplémentaires, initialement caché -->
                    <div class="additional-links" id="links-<?= htmlspecialchars($game['id']) ?>" style="display:none;">
                        <!-- Liens vers les informations supplémentaires sur le jeu -->
                        <a href="games/<?= htmlspecialchars($game['id']) ?>">Informations</a>
                        <a href="story/<?= htmlspecialchars($game['id']) ?>">Histoire</a>
                        <a href="character/<?= htmlspecialchars($game['id']) ?>">Personnage</a>
                        <a href="boss/<?= htmlspecialchars($game['id']) ?>">Boss</a>
                    </div>
                    <!-- Description du jeu -->
                    <p><?= htmlspecialchars($game['descriptions_article']) ?></p> <!-- Description du jeu affichée -->
                </div>
            <?php endforeach; ?>
            <?php if (empty($games)): ?> <!-- Vérifie si la liste des jeux est vide -->
                <h1>Information non trouvée</h1> <!-- Affiche un message si aucune information n'est trouvée -->
            <?php endif; ?>
        </div> <!-- Fin du conteneur principal pour la liste des jeux -->
        <script src="./assets/js/games.js"></script> <!-- Inclusion du script JavaScript pour gérer l'affichage des jeux -->
        <?php
    }
}

?>

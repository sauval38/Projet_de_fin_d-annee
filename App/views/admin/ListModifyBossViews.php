<?php

namespace AdminViews;

// Déclaration de la classe ListModifyBossViews dans l'espace de noms Views
class ListModifyBossViews {
     
    // Méthode pour afficher la liste des jeux à modifier les boss
    public function listModifyBoss($games) {
        // Début de la génération du contenu HTML pour la liste des jeux
        ?>
        <h1 id="titre-list">LISTE DES JEUX</h1> <!-- Titre principal pour la liste des jeux -->
        <div id="list-modify-boss-admin"> <!-- Conteneur principal pour la liste des jeux -->
            <?php foreach ($games as $game): ?> <!-- Boucle à travers chaque jeu dans la liste -->
                <div class="list"> <!-- Conteneur pour chaque jeu individuel -->
                    <!-- Lien vers la page de modification des boss pour ce jeu, avec l'ID du jeu -->
                    <a href="admin/modifyBoss/<?= htmlspecialchars($game['id']) ?>">
                        <?= htmlspecialchars($game['titles_article']) ?> <!-- Titre du jeu affiché -->
                    </a>
                    <!-- Image du jeu -->
                    <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_article']) ?>" alt="games<?= htmlspecialchars($game['titles_article']) ?>"> <!-- Attribut alt pour l'image du jeu -->
                    <!-- Description du jeu -->
                    <p><?= htmlspecialchars($game['descriptions_article']) ?></p> <!-- Description du jeu affichée -->
                </div>
            <?php endforeach; ?> <!-- Fin de la boucle à travers les jeux -->
        </div> <!-- Fin du conteneur principal pour la liste des jeux -->
        <?php
    }
}

?>

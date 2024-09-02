<?php

namespace Views;

// Déclaration de la classe ListModifyCharacterViews dans l'espace de noms Views
class ListModifyCharacterViews {

    // Méthode pour afficher la liste des jeux pour la modification des personnages
    public function listModifyCharacter($games) {
        // Début de la génération du contenu HTML pour la liste des jeux
        ?>
        <h1>LISTE DES JEUX</h1> <!-- Titre principal pour la liste des jeux -->
        <div id="list-modify-character-admin"> <!-- Conteneur principal pour la liste des jeux -->
            <?php foreach ($games as $game): ?> <!-- Boucle à travers chaque jeu dans la liste -->
                <div class="list"> <!-- Conteneur pour chaque jeu individuel -->
                    <!-- Lien vers la page de modification des personnages pour ce jeu, avec l'ID du jeu -->
                    <a href="admin/modifyCharacter/<?= htmlspecialchars($game['id']) ?>">
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

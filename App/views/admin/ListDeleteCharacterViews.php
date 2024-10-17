<?php

namespace AdminViews;

// Déclaration de la classe ListDeleteCharacterViews dans l'espace de noms Views
class ListDeleteCharacterViews {

    // Méthode pour afficher la liste des jeux avec une option pour supprimer les personnages
    public function listDeleteCharacter($games) {
        // Début de la génération du contenu HTML pour la liste des jeux
        ?>
        <h1 id="titre-list">LISTE DES JEUX</h1> <!-- Titre principal pour la liste des jeux -->
        <div id="list-delete-character-admin"> <!-- Conteneur principal pour la liste des jeux -->
            <?php foreach ($games as $game): ?> <!-- Boucle à travers chaque élément de la liste des jeux -->
                <div class="list"> <!-- Conteneur pour chaque jeu individuel -->
                    <!-- Lien vers la page de suppression du personnage, avec le paramètre d'identification du jeu -->
                    <a href="admin/deleteCharacter/<?= htmlspecialchars($game['id']) ?>">
                        <?= htmlspecialchars($game['titles_article']) ?> <!-- Titre du jeu affiché dans le lien -->
                    </a>
                    <!-- Image du jeu -->
                    <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_article']) ?>" alt="games<?= htmlspecialchars($game['titles_article']) ?>"> <!-- Attribut alt pour l'image du jeu -->
                    <!-- Description du jeu -->
                    <p><?= htmlspecialchars($game['descriptions_article']) ?></p> <!-- Description du jeu -->
                </div>
            <?php endforeach; ?> <!-- Fin de la boucle -->
        </div> <!-- Fin du conteneur principal pour la liste des jeux -->
        <?php
    }
}

?>

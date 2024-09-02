<?php

namespace Views;

// Déclaration de la classe ListCharacterViews dans l'espace de noms Views
class ListCharacterViews {

    // Méthode pour afficher la liste des personnages
    public function listCharacter($characters) {
        // Début de la génération du contenu HTML pour la liste des personnages
        ?>
        <h1>LISTE DES PERSONNAGES</h1> <!-- Titre principal pour la liste des personnages -->
        <div id="list-character-admin"> <!-- Conteneur principal pour la liste des personnages -->
            <?php foreach ($characters as $character): ?> <!-- Boucle à travers chaque élément de la liste des personnages -->
                <div class="list"> <!-- Conteneur pour chaque personnage -->
                    <!-- Lien vers la page de modification du personnage, avec les paramètres d'identification du personnage -->
                    <a href="admin/modifyCharacter/<?= htmlspecialchars($character['games_id']) ?>/<?= htmlspecialchars($character['id']) ?>">
                        <?= htmlspecialchars($character['names_character']) ?> <!-- Nom du personnage affiché dans le lien -->
                    </a>
                    <!-- Image du personnage -->
                    <img src="<?= htmlspecialchars($character['path'] . '/' . $character['images_character']) ?>" alt="character<?= htmlspecialchars($character['names_character']) ?>"> <!-- Attribut alt pour l'image du personnage -->
                </div>
            <?php endforeach; ?> <!-- Fin de la boucle -->
        </div> <!-- Fin du conteneur principal pour la liste des personnages -->
        <?php
    }
}

?>

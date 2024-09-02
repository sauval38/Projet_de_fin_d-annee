<?php

namespace Views;

// Déclaration de la classe ListBossViews dans l'espace de noms Views
class ListBossViews {

    // Méthode pour afficher la liste des boss
    public function listCharacter($boss) {
        // Début de la génération du contenu HTML pour la liste des boss
        ?>
        <h1>LISTE DES BOSS</h1> <!-- Titre principal pour la liste des boss -->
        <div id="list-boss-admin"> <!-- Conteneur principal pour la liste des boss -->
            <?php foreach ($boss as $boss): ?> <!-- Boucle à travers chaque élément de la liste des boss -->
                <div class="list"> <!-- Conteneur pour chaque boss -->
                    <!-- Lien vers la page de modification du boss, avec les paramètres d'identification du boss -->
                    <a href="admin/modifyBoss/<?= htmlspecialchars($boss['games_id']) ?>/<?= htmlspecialchars($boss['id']) ?>">
                        <?= htmlspecialchars($boss['name_boss']) ?> <!-- Nom du boss affiché dans le lien -->
                    </a>
                    <!-- Image du boss -->
                    <img src="<?= htmlspecialchars($boss['path'] . '/' . $boss['images_boss']) ?>" alt="boss<?= htmlspecialchars($boss['name_boss']) ?>"> <!-- Attribut alt pour l'image du boss -->
                </div>
            <?php endforeach; ?> <!-- Fin de la boucle -->
        </div> <!-- Fin du conteneur principal pour la liste des boss -->
        <?php
    }
}

?>

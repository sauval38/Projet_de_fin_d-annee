<?php

namespace Views;

// Déclaration de la classe BossViews dans l'espace de noms Views
class BossViews {

    // Méthode pour afficher les vues des boss d'un jeu
    public function bossViews($game) {

        // Vérifie si $game est défini, est un tableau et n'est pas vide
        if (isset($game) && is_array($game) && !empty($game)) {
            ?>

            <!-- Affiche le titre du jeu (nom du jeu) -->
            <h1 id="titre-detail"><?= htmlspecialchars($game[0]['titles_article']) ?></h1>

            <!-- Conteneur pour les détails des boss du jeu -->
            <div id="game-boss-detail">
                <!-- Lien pour fermer la vue des détails et revenir à la liste des jeux -->
                <a href="listgames" class="close-button">&times;</a>

                <!-- Conteneur pour afficher les informations des boss en grille -->
                <div class="game-character-grid">

                    <?php 
                    // Définition des clés et labels pour les informations des boss
                    $boss = [
                        'names_boss' => 'Name',
                        'descriptions_boss' => 'Descriptions',
                        'HP_boss' => 'HP',
                        'MP_boss' => 'MP',
                        'loots_boss' => 'Butins',
                        'weakness_boss' => 'Weakness',
                        'location_boss' => 'Location',
                        'gils_boss' => 'Gils',
                        'experiences_boss' => 'Experiences',
                    ];

                    // Boucle à travers chaque élément de $game pour afficher les informations du boss
                    foreach ($game as $item): 
                        ?>
                        <!-- Conteneur pour les informations d'un boss -->
                        <div class="game-character-block">

                            <!-- Conteneur pour l'image du boss -->
                            <div class="game-character-image">
                                <?php if (isset($item['path']) && isset($item['images_boss'])): ?>
                                    <!-- Affiche l'image du boss si le chemin et l'image sont définis -->
                                    <img src="<?= htmlspecialchars($item['path'] . '/' . $item['images_boss']) ?>" alt="boss<?= htmlspecialchars($item['titles_article']) ?>">
                                <?php endif; ?>
                            </div>

                            <!-- Conteneur pour les informations textuelles du boss -->
                            <div class="game-character-info">
                                <?php 
                                // Boucle à travers chaque élément du tableau $boss pour afficher les détails
                                foreach ($boss as $key => $label) {
                                    // Affiche les informations seulement si la clé existe et n'est pas vide
                                    if (!empty($item[$key])) {
                                        ?>
                                        <!-- Conteneur pour chaque élément d'information du boss -->
                                        <div class="game-character-item">
                                            <!-- Affiche le label de l'information suivi de la valeur -->
                                            <h2><?= htmlspecialchars($label) ?>:<br></h2>
                                            <p><?= nl2br(htmlspecialchars($item[$key]))?></p>
                                        </div>
                                        <?php
                                    }
                                } 
                                ?>
                            </div>
                        </div>
                    <?php 
                    endforeach;
                    ?>
                </div>
            </div>
            <?php
        } else {
            ?>
            <!-- Affiche un message d'erreur si aucune information n'est trouvée -->
            <h1>Informations non trouvées</h1>
            <?php
        }
    }
}
?>

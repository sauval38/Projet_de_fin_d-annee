<?php

namespace Views;

// Déclaration de la classe CharacterViews dans l'espace de noms Views
class CharacterViews {
    // Méthode pour afficher les détails des personnages d'un jeu
    public function characterViews($game) {
        // Vérifie si la variable $game est définie, est un tableau et n'est pas vide
        if (isset($game) && is_array($game) && !empty($game)) { 
            ?>
            <!-- Affiche le titre du jeu -->
            <h1><?= htmlspecialchars($game[0]['titles_article']) ?></h1>
            <!-- Conteneur pour les détails du personnage du jeu -->
            <div id="game-character-detail">
                <!-- Lien pour fermer la vue des détails et revenir à la liste des jeux -->
                <a href="listgames" class="close-button">&times;</a>
                <!-- Conteneur pour la grille des personnages du jeu -->
                <div class="game-character-grid">
                    <?php 
                    // Tableau associatif pour définir les étiquettes des caractéristiques du personnage
                    $character = [
                        'names_character' => 'Name',
                        'descriptions_character' => 'Description',
                        'jobs_character' => 'Job',
                        'limits_break_character' => 'Limit Break',
                        'age_character' => 'Age',
                        'armed_character' => 'Armed',
                        'size_character' => 'Size',
                        'date_o_birth_character' => 'Date of Birth',
                        'place_of_birth_character' => 'Place of Birth'
                    ];
                    // Itère sur chaque élément dans le tableau $game
                    foreach ($game as $item): 
                        ?>
                        <!-- Conteneur pour chaque bloc de personnage -->
                        <div class="game-character-block">
                            <!-- Conteneur pour l'image du personnage -->
                            <div class="game-character-image">
                                <?php 
                                // Vérifie si le chemin et l'image du personnage sont définis
                                if (isset($item['path']) && isset($item['images_character'])): ?>
                                    <!-- Affiche l'image du personnage -->
                                    <img src="<?= htmlspecialchars($item['path'] . '/' . $item['images_character']) ?>" alt="character<?= htmlspecialchars($item['titles_article']) ?>">
                                <?php endif; ?>
                            </div>
                            <!-- Conteneur pour les informations du personnage -->
                            <div class="game-character-info">
                                <?php 
                                // Itère sur les caractéristiques définies dans le tableau $character
                                foreach ($character as $key => $label) {
                                    // Vérifie si la donnée pour la clé $key n'est pas vide
                                    if (!empty($item[$key])) {
                                        ?>
                                        <!-- Conteneur pour chaque caractéristique du personnage -->
                                        <div class="game-character-item">
                                            <p><strong class="description-title"><?= htmlspecialchars($label) ?>:</strong><br><?= nl2br(htmlspecialchars($item[$key])) ?></p>
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
            // Si $game n'est pas défini ou est vide, affiche un message d'erreur
            ?>
            <h1>Informations non trouvées</h1>
            <?php
        }
    }
}

?>

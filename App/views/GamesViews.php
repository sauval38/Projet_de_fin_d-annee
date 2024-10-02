<?php

namespace Views;

// Déclaration de la classe GamesViews dans l'espace de noms Views
class GamesViews {
    
    // Méthode pour afficher les détails d'un jeu
    public function displayGame($game) {
        // Vérifie si la variable $game est définie
        if (isset($game)) {
            // Déclaration d'un tableau associatif contenant les champs à afficher et leurs labels correspondants
            $fields = [
                'descriptions_article' => 'Description',
                'gameplay_article' => 'Gameplay',
                'modes_article' => 'Modes',
                'genres_article' => 'Genres',
                'designers_article' => 'Créateurs',
                'developers_article' => 'Développeurs',
                'editors_article' => 'Editeurs',
                'platforms_article' => 'Plateformes',
                'gameplay_article' => 'Gameplay',
                'informations_article' => 'Informations'
            ];
            ?>
            <!-- Conteneur principal pour les détails du jeu -->
            <div id="games-detail">
                <!-- Lien pour fermer ou revenir à la liste des jeux -->
                <a href="listgames" class="close-button">&times;</a>
                <!-- Titre du jeu -->
                <h1><?= htmlspecialchars($game['titles_article']) ?></h1>
                <!-- Conteneur pour l'image du jeu -->
                <div class="games-image">
                    <!-- Affichage de l'image du jeu avec chemin sécurisé -->
                    <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_article']) ?>" alt="games<?= htmlspecialchars($game['titles_article']) ?>">
                </div>
                <!-- Conteneur pour les informations du jeu -->
                <div class="games-info">
                    <?php 
                    // Itération sur les champs définis dans le tableau $fields
                    foreach ($fields as $field => $label): 
                        ?>
                        <!-- Conteneur pour chaque élément d'information du jeu -->
                        <div class="games-item">
                            <h2><?= htmlspecialchars($label) ?></h2>
                            <!-- Affichage du label et de la valeur du champ -->
                            <p><?= htmlspecialchars($game[$field]) ?></p>
                        </div>
                    <?php 
                    endforeach; 
                    ?>
                </div>
            </div>
            <?php
        } else {
            ?>
            <!-- Message affiché lorsque les informations sur le jeu ne sont pas trouvées -->
            <h1>Informations non trouvées</h1>
            <?php
        }
    }
}
?>

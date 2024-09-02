<?php

namespace Views;

class StoryViews {
    
    /**
     * Affiche la vue d'une histoire de jeu.
     *
     * @param array $story Les informations de l'histoire à afficher.
     */
    public function storyView($story) {
        // Vérifie si les données de l'histoire sont définies. Si non, on ne fait rien et on quitte la méthode.
        if (!isset($story)) {
            return; 
        }
        
        // Échappe les caractères spéciaux pour le titre afin d'éviter les problèmes de sécurité.
        $title = htmlspecialchars($story['titles_article']);
        
        // Construit le chemin complet de l'image de l'histoire et échappe les caractères spéciaux pour la sécurité.
        $image = htmlspecialchars($story['path'] . '/' . $story['images_article']);
        
        // Échappe les caractères spéciaux pour le contenu de l'histoire et nettoie les balises HTML.
        $storyContent = htmlspecialchars($story['story_article']);
        
        ?>
        <div id="story-game">
            <!-- Lien pour fermer la vue d'histoire, redirige vers la liste des jeux -->
            <a href="listgames" class="close-button">&times;</a>
            
            <!-- Affiche le titre de l'histoire -->
            <h1><?= $title ?></h1>
            
            <div class="story">
                <!-- Affiche l'image associée à l'histoire -->
                <img src="<?= $image ?>" alt="story <?= $title ?>">
                
                <?php
                // Divise le contenu de l'histoire en paragraphes en utilisant <br /> comme délimiteur.
                $paragraphs = explode('<br />', $storyContent);
                
                // Parcourt chaque paragraphe et affiche uniquement les paragraphes non vides.
                foreach ($paragraphs as $paragraph) {
                    if (!empty(trim($paragraph))) {
                        ?>
                        <p><?= $paragraph ?></p>
                        <?php
                    }
                }
                ?>
            </div>
        </div>
        <?php
    }
}
?>

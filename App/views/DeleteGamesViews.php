<?php

namespace Views;

// Déclaration de la classe DeleteGamesViews dans l'espace de noms Views
class DeleteGamesViews {

    // Méthode pour afficher la liste des jeux à supprimer
    public function listDeleteGames($games) {
        ?>
        <!-- Titre de la page -->
        <h1 id="titre-list">LISTE DES JEUX</h1>
        <!-- Conteneur principal pour la liste des jeux à supprimer -->
        <div id="delete-games">
            <?php 
            // Vérifie si la variable $games n'est pas vide
            if (!empty($games)): 
                // Itère sur chaque élément dans le tableau $games
                foreach ($games as $game): 
                    ?>
                    <!-- Conteneur pour chaque jeu -->
                    <div class="list">
                        <!-- Affiche le titre du jeu -->
                        <h2 class="delete-title">
                            <?= htmlspecialchars($game['titles_article']) ?>
                        </h2>
                        <!-- Affiche l'image du jeu -->
                        <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_article']) ?>" alt="image<?= htmlspecialchars($game['titles_article']) ?>">
                        <!-- Affiche la description du jeu -->
                        <p><?= htmlspecialchars($game['descriptions_article']) ?></p>
                        
                        <!-- Conteneur pour le formulaire de suppression -->
                        <div class="button-container">
                            <form method="POST">
                                <!-- Champ caché pour transmettre l'identifiant du jeu -->
                                <input type="hidden" name="game_id" value="<?= htmlspecialchars($game['id']) ?>">
                                <!-- Bouton pour soumettre le formulaire et supprimer le jeu -->
                                <button type="submit" name="delete" value="1">Supprimer</button>
                            </form>
                        </div>
                    </div>
                <?php 
                endforeach; 
            // Si la variable $games est vide
            else: 
                ?>
                <!-- Message affiché lorsqu'aucune information n'est trouvée -->
                <h1>Information non trouvée</h1>
            <?php 
            endif; 
            ?>
        </div>
        <?php
    }
}
?>

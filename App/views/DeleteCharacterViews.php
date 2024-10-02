<?php

namespace Views;

// Déclaration de la classe DeleteCharacterViews dans l'espace de noms Views
class DeleteCharacterViews {

    // Méthode pour afficher la liste des personnages à supprimer
    public function listDeleteGames($games) {
        ?>
        <!-- Titre de la page -->
        <h1 id="titre-list">LISTE DES PERSONNAGES</h1>
        <!-- Conteneur principal pour la liste des personnages à supprimer -->
        <div id="delete-character">
            <?php 
            // Vérifie si la variable $games n'est pas vide
            if (!empty($games)): 
                // Itère sur chaque élément dans le tableau $games
                foreach ($games as $game): 
                    ?>
                    <!-- Conteneur pour chaque personnage -->
                    <div class="list">
                        <!-- Affiche le nom du personnage -->
                        <h2 class="delete-title">
                            <?= htmlspecialchars($game['names_character']) ?>
                        </h2>
                        <!-- Affiche l'image du personnage -->
                        <img src="<?= htmlspecialchars($game['path'] . '/' . $game['images_character']) ?>" alt="image<?= htmlspecialchars($game['names_character']) ?>">
                        <!-- Conteneur pour le formulaire de suppression -->
                        <div class="button-container">
                            <form method="POST">
                                <!-- Champ caché pour transmettre l'identifiant du personnage -->
                                <input type="hidden" name="character_id" value="<?= htmlspecialchars($game['id']) ?>">
                                <!-- Bouton pour soumettre le formulaire et supprimer le personnage -->
                                <button type="submit" name="delete">Supprimer</button>
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

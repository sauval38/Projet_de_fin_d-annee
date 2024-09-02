<?php

namespace Views;

// Déclaration de la classe ModifyGamesViews dans l'espace de noms Views
class ModifyGamesViews {

    // Méthode pour afficher le formulaire de modification d'un jeu
    public function FormModifyViews($modify) {
        ?>
        <!-- Conteneur principal pour le formulaire de modification du jeu -->
        <div id="modify-games">
            <h1>Modifier un jeu</h1> <!-- Titre du formulaire -->

            <!-- Formulaire de modification avec la méthode POST et le type d'encodage multipart/form-data pour les fichiers -->
            <form class="form-modify-games" method="post" enctype="multipart/form-data">

                <!-- Champ caché pour l'identifiant du jeu -->
                <input type="hidden" id="id_game" name="id_game" value="<?= htmlspecialchars($modify['id']) ?>">

                <!-- Champ pour le titre du jeu -->
                <label for="titles">Titres :</label>
                <input type="text" id="titles" name="titles" value="<?= htmlspecialchars($modify['titles_article']) ?>" required>

                <!-- Champ pour la description du jeu -->
                <label for="descriptions">Descriptions :</label>
                <textarea id="descriptions" name="descriptions" required><?= htmlspecialchars($modify['descriptions_article']) ?></textarea>

                <!-- Champ pour l'histoire du jeu -->
                <label for="story">Histoires :</label>
                <textarea id="story" name="story" required><?= htmlspecialchars($modify['story_article']) ?></textarea>

                <!-- Champ pour les plates-formes du jeu -->
                <label for="platforms">Plates-formes :</label>
                <input type="text" id="platforms" name="platforms" value="<?= htmlspecialchars($modify['platforms_article']) ?>" required>

                <!-- Champ pour les modes de jeu -->
                <label for="modes">Modes de jeux :</label>
                <input type="text" id="modes" name="modes" value="<?= htmlspecialchars($modify['modes_article']) ?>" required>

                <!-- Champ pour les genres du jeu -->
                <label for="genres">Genres :</label>
                <input type="text" id="genres" name="genres" value="<?= htmlspecialchars($modify['genres_article']) ?>" required>

                <!-- Champ pour les concepteurs du jeu -->
                <label for="designers">Concepteurs :</label>
                <input type="text" id="designers" name="designers" value="<?= htmlspecialchars($modify['designers_article']) ?>" required>

                <!-- Champ pour les développeurs du jeu -->
                <label for="developers">Développeurs :</label>
                <input type="text" id="developers" name="developers" value="<?= htmlspecialchars($modify['developers_article']) ?>" required>

                <!-- Champ pour les éditeurs du jeu -->
                <label for="editors">Éditeurs :</label>
                <input type="text" id="editors" name="editors" value="<?= htmlspecialchars($modify['editors_article']) ?>" required>

                <!-- Champ pour le gameplay du jeu -->
                <label for="gameplay">Gameplay :</label>
                <textarea id="gameplay" name="gameplay" required><?= htmlspecialchars($modify['gameplay_article']) ?></textarea>

                <!-- Champ pour les informations supplémentaires sur le jeu -->
                <label for="informations">Information :</label>
                <textarea id="informations" name="informations" required><?= htmlspecialchars($modify['informations_article']) ?></textarea>

                <!-- Champ pour la date de sortie du jeu -->
                <label for="dates">Dates de sortie :</label>
                <input type="date" id="dates" name="dates" value="<?= htmlspecialchars($modify['dates_release']) ?>" required>

                <!-- Champ pour le téléchargement d'une image -->
                <label for="images_path">Chemin de l'image :</label>
                <input type="file" id="images_path" name="images_path" accept="image/*">
                
                <!-- Bouton pour soumettre le formulaire -->
                <input type="submit" value="Modifier">
            </form>
        </div>
        <?php
    }
}
?>

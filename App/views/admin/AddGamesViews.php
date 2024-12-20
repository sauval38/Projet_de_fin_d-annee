<?php

namespace AdminViews;

class AddGamesViews {

    /**
     * Affiche le formulaire pour ajouter un jeu.
     */
    public function add() {
        ?>
        <div id="add-games">
            <h1 id="ajouter">Ajouter un jeu</h1>
            <form class="form-add-games" method="post" enctype="multipart/form-data">
                
                <!-- Champ pour entrer le titre du jeu -->
                <label for="titles">Titres :</label>
                <input type="text" id="titles" name="titles" value="<?= isset($_POST['titles']) ? htmlspecialchars($_POST['titles']) : '' ?>" required>
                
                <!-- Champ pour entrer la description du jeu -->
                <label for="descriptions">Descriptions :</label>
                <textarea id="descriptions" name="descriptions" required><?= isset($_POST['descriptions']) ? htmlspecialchars($_POST['descriptions']) : '' ?></textarea>
                
                <!-- Champ pour entrer l'histoire du jeu -->
                <label for="story">Histoire :</label>
                <textarea id="story" name="story" required><?= isset($_POST['story']) ? htmlspecialchars($_POST['story']) : '' ?></textarea>
                
                <!-- Champ pour entrer les plateformes sur lesquelles le jeu est disponible -->
                <label for="platforms">Plates-formes :</label>
                <input type="text" id="platforms" name="platforms" value="<?= isset($_POST['platforms']) ? htmlspecialchars($_POST['platforms']) : '' ?>" required>
                
                <!-- Champ pour entrer les modes de jeu disponibles -->
                <label for="modes">Modes de jeux :</label>
                <input type="text" id="modes" name="modes" value="<?= isset($_POST['modes']) ? htmlspecialchars($_POST['modes']) : '' ?>" required>
                
                <!-- Champ pour entrer les genres du jeu -->
                <label for="genres">Genres :</label>
                <input type="text" id="genres" name="genres" value="<?= isset($_POST['genres']) ? htmlspecialchars($_POST['genres']) : '' ?>" required>
                
                <!-- Champ pour entrer les concepteurs du jeu -->
                <label for="designers">Concepteurs :</label>
                <input type="text" id="designers" name="designers" value="<?= isset($_POST['designers']) ? htmlspecialchars($_POST['designers']) : '' ?>" required>
                
                <!-- Champ pour entrer les développeurs du jeu -->
                <label for="developers">Développeurs :</label>
                <input type="text" id="developers" name="developers" value="<?= isset($_POST['developers']) ? htmlspecialchars($_POST['developers']) : '' ?>" required>
                
                <!-- Champ pour entrer les éditeurs du jeu -->
                <label for="editors">Éditeurs :</label>
                <input type="text" id="editors" name="editors" value="<?= isset($_POST['editors']) ? htmlspecialchars($_POST['editors']) : '' ?>" required>
                
                <!-- Champ pour entrer des informations supplémentaires sur le jeu -->
                <label for="informations">Informations supplémentaires :</label>
                <input type="text" id="informations" name="informations" value="<?= isset($_POST['informations']) ? htmlspecialchars($_POST['informations']) : '' ?>" required>
                
                <!-- Champ pour entrer des informations sur le gameplay -->
                <label for="gameplay">Gameplay :</label>
                <input type="text" id="gameplay" name="gameplay" value="<?= isset($_POST['gameplay']) ? htmlspecialchars($_POST['gameplay']) : '' ?>" required>
                
                <!-- Champ pour entrer la date de sortie du jeu -->
                <label for="dates">Dates de sortie :</label>
                <input type="datetime-local" id="dates" name="dates" value="<?= isset($_POST['dates']) ? htmlspecialchars($_POST['dates']) : '' ?>" required>
                
                <!-- Champ pour uploader une image du jeu -->
                <label for="images_path">Chemin de l'image :</label>
                <input type="file" id="images_path" name="images_path" accept="image/*" required>
                
                <!-- Bouton pour soumettre le formulaire -->
                <input type="submit" value="Ajouter">
            </form>
        </div>
        <?php
    }

}

?>

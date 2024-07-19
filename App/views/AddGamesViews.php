<?php

namespace Views;

class AddGamesViews {

    const ADD_GAME_URL = "admin/ajouterunjeux";

    public function add() {
        ?>
        <div id="form-games">
            <h1 id="ajouter">Ajouter un jeu</h1>
            <form class="form-add-games" action="<?= htmlspecialchars(self::ADD_GAME_URL) ?>" method="post" enctype="multipart/form-data">
                
                <label for="titles">Titres :</label>
                <input type="text" id="titles" name="titles" value="<?= isset($_POST['titles']) ? htmlspecialchars($_POST['titles']) : '' ?>" required>
                
                <label for="descriptions">Descriptions :</label>
                <textarea type="text" id="descriptions" name="descriptions" required><?= isset($_POST['descriptions']) ? htmlspecialchars($_POST['descriptions']) : '' ?></textarea>
                
                <label for="story">Histoire :</label>
                <textarea type="text" id="story" name="story" required><?= isset($_POST['story']) ? htmlspecialchars($_POST['story']) : '' ?></textarea>
                
                <label for="platforms">Plates-formes :</label>
                <input type="text" id="platforms" name="platforms" value="<?= isset($_POST['platforms']) ? htmlspecialchars($_POST['platforms']) : '' ?>" required>
                
                <label for="modes">Modes de jeux :</label>
                <input type="text" id="modes" name="modes" value="<?= isset($_POST['modes']) ? htmlspecialchars($_POST['modes']) : '' ?>" required>
                
                <label for="genres">Genres :</label>
                <input type="text" id="genres" name="genres" value="<?= isset($_POST['genres']) ? htmlspecialchars($_POST['genres']) : '' ?>" required>
                
                <label for="designers">Concepteurs :</label>
                <input type="text" id="designers" name="designers" value="<?= isset($_POST['designers']) ? htmlspecialchars($_POST['designers']) : '' ?>" required>
                
                <label for="developers">Développeurs :</label>
                <input type="text" id="developers" name="developers" value="<?= isset($_POST['developers']) ? htmlspecialchars($_POST['developers']) : '' ?>" required>
                
                <label for="editors">Éditeurs :</label>
                <input type="text" id="editors" name="editors" value="<?= isset($_POST['editors']) ? htmlspecialchars($_POST['editors']) : '' ?>" required>
                
                <label for="informations">Informations supplémentaires :</label>
                <input type="text" id="informations" name="informations" value="<?= isset($_POST['informations']) ? htmlspecialchars($_POST['informations']) : '' ?>" required>
                
                <label for="gameplay">Gameplay :</label>
                <input type="text" id="gameplay" name="gameplay" value="<?= isset($_POST['gameplay']) ? htmlspecialchars($_POST['gameplay']) : '' ?>" required>
                
                <label for="dates">Dates de sortie :</label>
                <input type="datetime-local" id="dates" name="dates" value="<?= isset($_POST['dates']) ? htmlspecialchars($_POST['dates']) : '' ?>" required>
                
                <label for="images_path">Chemin de l'image :</label>
                <input type="file" id="images_path" name="images_path" accept="image/*" required>
                
                <input type="submit" value="Ajouter">
            </form>
        </div>
        <?php
    }

}

?>
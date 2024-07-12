<?php

namespace Views;

class AddGamesViews {

    const ADD_GAME_URL = "admin/ajouterunjeux";

    public function add() {
        ?>
        <div class="form-container">
            <h1 id="ajouter">Ajouter un jeu</h1>
            <form class="form" action="<?= self::ADD_GAME_URL ?>" method="post" enctype="multipart/form-data">
                
                <label for="titles">Titres :</label>
                <input type="text" id="titles" name="titles" required>
                
                <label for="descriptions">Descriptions :</label>
                <textarea id="descriptions" name="descriptions" required></textarea>
                
                <label for="story">Histoire :</label>
                <textarea id="story" name="story" required></textarea>
                
                <label for="platforms">Plates-formes :</label>
                <input type="text" id="platforms" name="platforms" required>
                
                <label for="modes">Modes de jeux :</label>
                <input type="text" id="modes" name="modes" required>
                
                <label for="genres">Genres :</label>
                <input type="text" id="genres" name="genres" required>
                
                <label for="designers">Concepteurs :</label>
                <input type="text" id="designers" name="designers" required>
                
                <label for="developers">Développeurs :</label>
                <input type="text" id="developers" name="developers" required>
                
                <label for="editors">Éditeurs :</label>
                <input type="text" id="editors" name="editors" required>
                
                <label for="informations">Informations supplémentaires :</label>
                <input type="text" id="informations" name="informations" required>
                
                <label for="gameplay">Gameplay :</label>
                <input type="text" id="gameplay" name="gameplay" required>
                
                <label for="dates">Dates de sortie :</label>
                <input type="datetime-local" id="dates" name="dates" required>
                
                <label for="images_path">Chemin de l'image :</label>
                <input type="file" id="images_path" name="images_path" accept="image/*" required>
                
                <input type="submit" value="Ajouter">
            </form>
        </div>
        <?php
    }

}

?>
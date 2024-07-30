<?php

namespace Views;

class ModifyGamesViews {

    public function FormModifyViews($modify) {
        ?>
        <div id="modify-games">
            <h1>Modifier un jeu</h1>
            <form class="form-modify-games" method="post" enctype="multipart/form-data">

                <input type="hidden" id="id_game" name="id_game" value="<?= htmlspecialchars($modify['id']) ?>">

                <label for="titles">Titres :</label>
                <input type="text" id="titles" name="titles" value="<?= htmlspecialchars($modify['titles_article']) ?>" required>

                <label for="descriptions">Descriptions :</label>
                <textarea id="descriptions" name="descriptions" required><?= htmlspecialchars($modify['descriptions_article']) ?></textarea>

                <label for="story">Histoires :</label>
                <textarea id="story" name="story" required><?= htmlspecialchars($modify['story_article']) ?></textarea>

                <label for="platforms">Plates-formes :</label>
                <input type="text" id="platforms" name="platforms" value="<?= htmlspecialchars($modify['platforms_article']) ?>" required>

                <label for="modes">Modes de jeux :</label>
                <input type="text" id="modes" name="modes" value="<?= htmlspecialchars($modify['modes_article']) ?>" required>

                <label for="genres">Genres :</label>
                <input type="text" id="genres" name="genres" value="<?= htmlspecialchars($modify['genres_article']) ?>" required>

                <label for="designers">Concepteurs :</label>
                <input type="text" id="designers" name="designers" value="<?= htmlspecialchars($modify['designers_article']) ?>" required>

                <label for="developers">Développeurs :</label>
                <input type="text" id="developers" name="developers" value="<?= htmlspecialchars($modify['developers_article']) ?>" required>

                <label for="editors">Éditeurs :</label>
                <input type="text" id="editors" name="editors" value="<?= htmlspecialchars($modify['editors_article']) ?>" required>

                <label for="gameplay">Gameplay :</label>
                <textarea id="gameplay" name="gameplay" required><?= htmlspecialchars($modify['gameplay_article']) ?></textarea>

                <label for="informations">Information :</label>
                <textarea id="informations" name="informations" required><?= htmlspecialchars($modify['informations_article']) ?></textarea>

                <label for="dates">Dates de sortie :</label>
                <input type="date" id="dates" name="dates" value="<?= htmlspecialchars($modify['dates_release']) ?>" required>

                <label for="images_path">Chemin de l'image :</label>
                <input type="file" id="images_path" name="images_path" accept="image/*">
                
                <input type="submit" value="Modifier">
            </form>
        </div>
<?php
    }
}
?>
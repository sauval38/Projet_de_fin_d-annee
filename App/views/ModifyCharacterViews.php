<?php 

namespace Views;

class ModifyCharacterViews {

    function updateForm($character) {
        ?>
        <div id="modification">
            <h1>Modifier un personnage</h1>
            <form class="form-modification-games" method="post" enctype="multipart/form-data">

                <input type="hidden" id="id_character" name="id_character" value="<?= htmlspecialchars($character['id']) ?>">
                
                <label for="names">Names :</label>
                <input type="text" id="names" name="names" value="<?= htmlspecialchars($character['names_character']) ?>">

                <label for="descriptions">Descriptions :</label>
                <input type="text"id="descriptions" name="descriptions" value="<?= htmlspecialchars($character['descriptions_character']) ?>">

                <label for="jobs">Emplois :</label>
                <input type="text"id="jobs" name="jobs" value="<?= htmlspecialchars($character['jobs_character']) ?>">

                <label for="limits_break">Limits Break :</label>
                <input type="text" id="limits_break" name="limits_break" value="<?= htmlspecialchars($character['limits_break_character']) ?>">

                <label for="age">Age :</label>
                <input type="number"id="age" name="age" value="<?= htmlspecialchars($character['age_character']) ?>">

                <label for="armed">Arme :</label>
                <input type="text"id="armed" name="armed" value="<?= htmlspecialchars($character['armed_character']) ?>">

                <label for="size">Taille :</label>
                <input type="decimal"id="size" name="size" value="<?= ($character['size_character']) ?>">

                <label for="place_of_birth">Lieu de naissance :</label>
                <input type="text"  id="place_of_birth" name="place_of_birth" value="<?= htmlspecialchars($character['place_of_birth_character']) ?>">

                <label for="date_o_birth">Date de naissance :</label>
                <input type="datetime-local"  id="date_o_birth" name="date_o_birth" value="<?= htmlspecialchars($character['date_o_birth_character']) ?>">

                <label for="images_path">Chemin de l'image :</label>
                <input type="file" id="images_path" name="images_path" accept="image/*">

                <input type="submit" value="Ajouter">
            </form>
        </div>
        <?php
    }
}
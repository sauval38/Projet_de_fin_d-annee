<?php

namespace Views;

class AddCharacterViews {

    const ADD_CHARACTER_URL = "admin/ajouterunpersonnage";

    public function addCharacterViews($titles) {
        ?>
        <div id="form-character">
            <h1 id="ajouter">Ajouter un personnage</h1>
            <form class="form-add-character" method="post" action="<?= self::ADD_CHARACTER_URL ?>" enctype="multipart/form-data">
                
                <label for="titles">Choisir le jeu :</label>
                <select name="titles" id="titles">
                    <?php if (!empty($titles)) : ?>
                        <?php foreach ($titles as $title) : ?>
                            <option value="<?= htmlspecialchars($title['id']) ?>"><?= htmlspecialchars($title['titles_article']) ?></option>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <option>Aucun titre disponible</option>
                    <?php endif; ?>
                </select>
                
                <label for="names">Noms :</label>
                <input type="text" id="names" name="names" required>
                
                <label for="descriptions">Descriptions :</label>
                <input type="text" id="descriptions" name="descriptions" required>

                <label for="jobs">Emplois :</label>
                <input type="text" id="jobs" name="jobs">

                <label for="limits_break">Limits Break :</label>
                <input type="text" id="limits_break" name="limits_break">

                <label for="age">Age :</label>
                <input type="number" id="age" name="age">

                <label for="armed">Arme :</label>
                <input type="text" id="armed" name="armed">

                <label for="size">Taille :</label>
                <input type="decimal" id="size" name="size">

                <label for="place_of_birth">Lieu de naissance :</label>
                <input type="text" id="place_of_birth" name="place_of_birth">

                <label for="date_o_birth">Date de naissance :</label>
                <input type="datetime-local" id="date_o_birth" name="date_o_birth">
                
                <label for="images_path">Chemin de l'image :</label>
                <input type="file" id="images_path" name="images_path" accept="image/*" required>

                <input type="submit" value="Ajouter">
            </form>
        </div>
        <?php
    }
}

?>
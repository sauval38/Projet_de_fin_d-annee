<?php

namespace AdminViews;

class AddCharacterViews {

    /**
     * Affiche le formulaire d'ajout d'un personnage.
     * 
     * @param array $titles Tableau contenant les titres des jeux disponibles.
     */
    public function addCharacterViews($titles) {
        ?>
        <div id="add-character">
            <h1 id="ajouter">Ajouter un personnage</h1>
            <form class="form-add-character" method="post" enctype="multipart/form-data">
                
                <!-- Champ pour choisir le jeu -->
                <label for="titles">Choisir le jeu :</label>
                <select name="titles" id="titles">
                    <?php if (!empty($titles)) : ?>
                        <?php foreach ($titles as $title) : ?>
                            <!-- Option pour chaque titre de jeu disponible -->
                            <option value="<?= htmlspecialchars($title['id']) ?>">
                                <?= htmlspecialchars($title['titles_article']) ?>
                            </option>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <!-- Option indiquant qu'aucun titre n'est disponible -->
                        <option>Aucun titre disponible</option>
                    <?php endif; ?>
                </select>
                
                <!-- Champ pour entrer le nom du personnage -->
                <label for="names">Noms :</label>
                <input type="text" id="names" name="names" required>
                
                <!-- Champ pour entrer la description du personnage -->
                <label for="descriptions">Descriptions :</label>
                <input type="text" id="descriptions" name="descriptions" required>

                <!-- Champ pour entrer les emplois du personnage -->
                <label for="jobs">Emplois :</label>
                <input type="text" id="jobs" name="jobs">

                <!-- Champ pour entrer les limites de rupture du personnage -->
                <label for="limits_break">Limits Break :</label>
                <input type="text" id="limits_break" name="limits_break">

                <!-- Champ pour entrer l'âge du personnage -->
                <label for="age">Age :</label>
                <input type="number" id="age" name="age">

                <!-- Champ pour entrer l'arme du personnage -->
                <label for="armed">Arme :</label>
                <input type="text" id="armed" name="armed">

                <!-- Champ pour entrer la taille du personnage -->
                <label for="size">Taille :</label>
                <input type="decimal" id="size" name="size">

                <!-- Champ pour entrer le lieu de naissance du personnage -->
                <label for="place_of_birth">Lieu de naissance :</label>
                <input type="text" id="place_of_birth" name="place_of_birth">

                <!-- Champ pour entrer la date de naissance du personnage -->
                <label for="date_o_birth">Date de naissance :</label>
                <input type="datetime-local" id="date_o_birth" name="date_o_birth">
                
                <!-- Champ pour uploader une image du personnage -->
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

<?php

namespace AdminViews;

class AddBossViews {

    /**
     * Affiche le formulaire d'ajout d'un boss.
     * 
     * @param array $titles Tableau contenant les titres des jeux disponibles.
     */
    public function addBossViews($titles) {
        ?>
        <div id="add-boss">
            <h1 id="ajouter">Ajouter un boss</h1>
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

                <!-- Champ pour entrer le nom du boss -->
                <label for="names">Noms :</label>
                <input type="text" id="names" name="names" required>

                <!-- Champ pour entrer la description du boss -->
                <label for="descriptions">Descriptions :</label>
                <input type="text" id="descriptions" name="descriptions" required>

                <!-- Champ pour entrer les HP du boss -->
                <label for="HP">HP :</label>
                <input type="number" id="HP" name="HP">

                <!-- Champ pour entrer les MP du boss -->
                <label for="MP">MP :</label>
                <input type="number" id="MP" name="MP">

                <!-- Champ pour entrer les butins du boss -->
                <label for="loots">Butins :</label>
                <input type="text" id="loots" name="loots">

                <!-- Champ pour entrer la faiblesse du boss -->
                <label for="weakness">Faiblesse :</label>
                <input type="text" id="weakness" name="weakness">

                <!-- Champ pour entrer la localisation du boss -->
                <label for="location">Location :</label>
                <input type="text" id="location" name="location">

                <!-- Champ pour entrer les gils du boss -->
                <label for="gils">Gils :</label>
                <input type="number" id="gils" name="gils">

                <!-- Champ pour entrer l'expérience du boss -->
                <label for="experiences">Experiences :</label>
                <input type="number" id="experiences" name="experiences">

                <!-- Champ pour uploader une image du boss -->
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

<?php

namespace Views;

class AddBossViews {

    public function addBossViews($titles) {
        ?>
        <div id="add-boss">
            <h1 id="ajouter">Ajouter un boss</h1>
            <form class="form-add-character" method="post" enctype="multipart/form-data">

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

                <label for="HP">HP :</label>
                <input type="number" id="HP" name="HP">

                <label for="MP">MP :</label>
                <input type="number" id="MP" name="MP">

                <label for="loots">
                butins :</label>
                <input type="text" id="loots" name="loots">

                <label for="weakness">
                Faiblesse :</label>
                <input type="text" id="weakness" name="weakness">

                <label for="location">
                Location :</label>
                <input type="text" id="location" name="location">

                <label for="gils">
                Gils :</label>
                <input type="number" id="gils" name="gils">

                <label for="experiences">
                Experiences :</label>
                <input type="number" id="experiences" name="experiences">

                <label for="images_path">Chemin de l'image :</label>
                <input type="file" id="images_path" name="images_path" accept="image/*" required>

                <input type="submit" value="Ajouter">

            </form>
        </div>
        <?php
    }
}

?>
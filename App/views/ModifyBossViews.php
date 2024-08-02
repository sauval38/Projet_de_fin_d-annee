<?php 

namespace Views;

class ModifyBossViews {
    
    function updateForm($boss) {
        ?>
        <div id="modify-boss">
            <h1>Modifier un boss</h1>
            <form class="form-modify-character" method="post" enctype="multipart/form-data">

                <input type="hidden" id="id_boss" name="id_boss" value="<?= htmlspecialchars($boss['id']) ?>">

                <label for="names">Names :</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($boss['name_boss']) ?>">

                <label for="descriptions">Descriptions :</label>
                <input type="text" id="descriptions" name="descriptions" value="<?= htmlspecialchars($boss['descriptions_boss']) ?>">

                <label for="HP">HP :</label>
                <input type="number" id="HP" name="HP" value="<?= htmlspecialchars($boss['HP_boss']) ?>">

                <label for="MP">MP :</label>
                <input type="number" id="MP" name="MP" value="<?= htmlspecialchars($boss['MP_boss']) ?>">

                <label for="loots">Butins :</label>
                <input type="text" id="loots" name="loots" value="<?= htmlspecialchars($boss['loots_boss']) ?>">

                <label for="weakness">Faiblesse :</label>
                <input type="text" id="weakness" name="weakness" value="<?= htmlspecialchars($boss['weakness_boss']) ?>">

                <label for="location">Location :</label>
                <input type="text" id="location" name="location" value="<?= htmlspecialchars($boss['location_boss']) ?>">

                <label for="gils">Gils :</label>
                <input type="number" id="gils" name="gils" value="<?= htmlspecialchars($boss['gils_boss']) ?>">

                <label for="experiences">Experiences :</label>
                <input type="number" id="experiences" name="experiences" value="<?= htmlspecialchars($boss['experiences_boss']) ?>">

                <label for="images_path">Chemin de l'image :</label>
                <input type="file" id="images_path" name="images_path" accept="image/*">

                <input type="submit" value="Ajouter">
            </form>
        </div>
        <?php
    }
}
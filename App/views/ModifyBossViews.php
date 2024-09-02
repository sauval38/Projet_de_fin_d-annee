<?php 

namespace Views;

// Déclaration de la classe ModifyBossViews dans l'espace de noms Views
class ModifyBossViews {
    
    // Méthode pour afficher le formulaire de modification d'un boss
    function updateForm($boss) {
        ?>
        <!-- Conteneur principal pour le formulaire de modification du boss -->
        <div id="modify-boss">
            <h1>Modifier un boss</h1> <!-- Titre du formulaire -->

            <!-- Formulaire de modification avec la méthode POST et le type d'encodage multipart/form-data pour les fichiers -->
            <form class="form-modify-character" method="post" enctype="multipart/form-data">

                <!-- Champ caché pour l'identifiant du boss -->
                <input type="hidden" id="id_boss" name="id_boss" value="<?= htmlspecialchars($boss['id']) ?>">

                <!-- Champ pour le nom du boss -->
                <label for="name">Name :</label>
                <input type="text" id="name" name="name" value="<?= htmlspecialchars($boss['name_boss']) ?>">

                <!-- Champ pour la description du boss -->
                <label for="descriptions">Descriptions :</label>
                <input type="text" id="descriptions" name="descriptions" value="<?= htmlspecialchars($boss['descriptions_boss']) ?>">

                <!-- Champ pour les points de vie (HP) du boss -->
                <label for="HP">HP :</label>
                <input type="number" id="HP" name="HP" value="<?= htmlspecialchars($boss['HP_boss']) ?>">

                <!-- Champ pour les points de magie (MP) du boss -->
                <label for="MP">MP :</label>
                <input type="number" id="MP" name="MP" value="<?= htmlspecialchars($boss['MP_boss']) ?>">

                <!-- Champ pour les butins du boss -->
                <label for="loots">Butins :</label>
                <input type="text" id="loots" name="loots" value="<?= htmlspecialchars($boss['loots_boss']) ?>">

                <!-- Champ pour la faiblesse du boss -->
                <label for="weakness">Faiblesse :</label>
                <input type="text" id="weakness" name="weakness" value="<?= htmlspecialchars($boss['weakness_boss']) ?>">

                <!-- Champ pour la localisation du boss -->
                <label for="location">Location :</label>
                <input type="text" id="location" name="location" value="<?= htmlspecialchars($boss['location_boss']) ?>">

                <!-- Champ pour les gils (monnaie) du boss -->
                <label for="gils">Gils :</label>
                <input type="number" id="gils" name="gils" value="<?= htmlspecialchars($boss['gils_boss']) ?>">

                <!-- Champ pour les points d'expérience du boss -->
                <label for="experiences">Experiences :</label>
                <input type="number" id="experiences" name="experiences" value="<?= htmlspecialchars($boss['experiences_boss']) ?>">

                <!-- Champ pour le téléchargement d'une image -->
                <label for="images_path">Chemin de l'image :</label>
                <input type="file" id="images_path" name="images_path" accept="image/*">

                <!-- Bouton pour soumettre le formulaire -->
                <input type="submit" value="Ajouter">
            </form>
        </div>
        <?php
    }
}

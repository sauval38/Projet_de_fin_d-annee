<?php 

namespace Views;

// Déclaration de la classe ModifyCharacterViews dans l'espace de noms Views
class ModifyCharacterViews {

    // Méthode pour afficher le formulaire de modification d'un personnage
    function updateForm($character) {
        ?>
        <!-- Conteneur principal pour le formulaire de modification du personnage -->
        <div id="modify-character">
            <h1 id="titre-list">Modifier un personnage</h1> <!-- Titre du formulaire -->

            <!-- Formulaire de modification avec la méthode POST et le type d'encodage multipart/form-data pour les fichiers -->
            <form class="form-modify-character" method="post" enctype="multipart/form-data">

                <!-- Champ caché pour l'identifiant du personnage -->
                <input type="hidden" id="id_character" name="id_character" value="<?= htmlspecialchars($character['id']) ?>">
                
                <!-- Champ pour le nom du personnage -->
                <label for="names">Nom :</label>
                <input type="text" id="names" name="names" value="<?= htmlspecialchars($character['names_character']) ?>">

                <!-- Champ pour la description du personnage -->
                <label for="descriptions">Descriptions :</label>
                <input type="text" id="descriptions" name="descriptions" value="<?= htmlspecialchars($character['descriptions_character']) ?>">

                <!-- Champ pour les emplois du personnage -->
                <label for="jobs">Emplois :</label>
                <input type="text" id="jobs" name="jobs" value="<?= htmlspecialchars($character['jobs_character']) ?>">

                <!-- Champ pour les limites de rupture du personnage -->
                <label for="limits_break">Limits Break :</label>
                <input type="text" id="limits_break" name="limits_break" value="<?= htmlspecialchars($character['limits_break_character']) ?>">

                <!-- Champ pour l'âge du personnage -->
                <label for="age">Age :</label>
                <input type="number" id="age" name="age" value="<?= htmlspecialchars($character['age_character']) ?>">

                <!-- Champ pour l'arme du personnage -->
                <label for="armed">Arme :</label>
                <input type="text" id="armed" name="armed" value="<?= htmlspecialchars($character['armed_character']) ?>">

                <!-- Champ pour la taille du personnage -->
                <label for="size">Taille :</label>
                <input type="number" step="0.01" id="size" name="size" value="<?= htmlspecialchars($character['size_character']) ?>">

                <!-- Champ pour le lieu de naissance du personnage -->
                <label for="place_of_birth">Lieu de naissance :</label>
                <input type="text" id="place_of_birth" name="place_of_birth" value="<?= htmlspecialchars($character['place_of_birth_character']) ?>">

                <!-- Champ pour la date de naissance du personnage -->
                <label for="date_o_birth">Date de naissance :</label>
                <input type="datetime-local" id="date_o_birth" name="date_o_birth" value="<?= htmlspecialchars($character['date_o_birth_character']) ?>">

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
?>

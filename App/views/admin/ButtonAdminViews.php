<?php

namespace AdminViews;

// Déclaration de la classe ButtonAdminViews dans l'espace de noms Views
class ButtonAdminViews {

    // Définition des constantes pour les URL des actions d'administration
    const ADD_GAME_URL = "admin/addGames";
    const MODIFY_GAME_URL = "admin/modifyGames";
    const DELETE_GAME_URL = "admin/deleteGames"; 
    const ADD_CHARACTER_URL = "admin/addCharacter";
    const MODIFY_CHARACTER_URL = "admin/modifyCharacter"; 
    const DELETE_CHARACTER_URL = "admin/deleteCharacter";
    const ADD_BOSS_URL = "admin/addBoss";
    const MODIFY_BOSS_URL = "admin/modifyBoss"; 
    const DELETE_BOSS_URL = "admin/deleteBoss"; 

    // Méthode pour afficher les boutons d'administration
    public function button() {
        ?>
        <!-- Conteneur pour les menus déroulants -->
        <div class="dropdown-container">
        
            <!-- Menu déroulant pour les jeux -->
            <div class="dropdown">
                <!-- Bouton pour ouvrir le menu déroulant des jeux -->
                <button class="lien">Jeux</button>
                <!-- Contenu du menu déroulant des jeux -->
                <div class="dropdown-content">
                    <!-- Lien pour ajouter un jeu -->
                    <a href="<?= self::ADD_GAME_URL ?>">Ajouter un jeu</a>
                    <!-- Lien pour modifier un jeu -->
                    <a href="<?= self::MODIFY_GAME_URL ?>">Modifier un jeu</a>
                    <!-- Lien pour supprimer un jeu -->
                    <a href="<?= self::DELETE_GAME_URL ?>">Supprimer un jeu</a>
                </div>
            </div>

            <!-- Menu déroulant pour les boss -->
            <div class="dropdown">
                <!-- Bouton pour ouvrir le menu déroulant des boss -->
                <button class="lien">Boss</button>
                <!-- Contenu du menu déroulant des boss -->
                <div class="dropdown-content">
                    <!-- Lien pour ajouter un boss -->
                    <a href="<?= self::ADD_BOSS_URL ?>">Ajouter un boss</a>
                    <!-- Lien pour modifier un boss -->
                    <a href="<?= self::MODIFY_BOSS_URL ?>">Modifier un boss</a>
                    <!-- Lien pour supprimer un boss -->
                    <a href="<?= self::DELETE_BOSS_URL ?>">Supprimer un boss</a>
                </div>
            </div>
        
            <!-- Menu déroulant pour les personnages -->
            <div class="dropdown">
                <!-- Bouton pour ouvrir le menu déroulant des personnages -->
                <button class="lien">Perso</button>
                <!-- Contenu du menu déroulant des personnages -->
                <div class="dropdown-content">
                    <!-- Lien pour ajouter un personnage -->
                    <a href="<?= self::ADD_CHARACTER_URL ?>">Ajouter un personnage</a>
                    <!-- Lien pour modifier un personnage -->
                    <a href="<?= self::MODIFY_CHARACTER_URL ?>">Modifier un personnage</a>
                    <!-- Lien pour supprimer un personnage -->
                    <a href="<?= self::DELETE_CHARACTER_URL ?>">Supprimer un personnage</a>
                </div>
            </div>

        </div>
        <?php
    }
}

?>

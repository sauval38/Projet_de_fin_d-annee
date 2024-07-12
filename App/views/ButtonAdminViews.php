<?php

namespace Views;

class ButtonAdminViews {

    
    const ADD_GAME_URL = "admin/ajouterunjeux";
    const MODIFY_GAME_URL = "admin/modifierunjeux";
    const DELETE_GAME_URL = "#"; 
    const ADD_CHARACTER_URL = "admin/ajouterunpersonnage";
    const MODIFY_CHARACTER_URL = "#"; 
    const DELETE_CHARACTER_URL = "#"; 

    public function button() {
        ?>
        <div class="dropdown-container">
        
            <div class="dropdown">
                <button class="lien">Jeux</button>
                <div class="dropdown-content">
                    <a href="<?= self::ADD_GAME_URL ?>">Ajouter un jeu</a>
                    <a href="<?= self::MODIFY_GAME_URL ?>">Modifier un jeu</a>
                    <a href="<?= self::DELETE_GAME_URL ?>">Supprimer un jeu</a>
                </div>
            </div>
        
            <div class="dropdown">
                <button class="lien">Personnage</button>
                <div class="dropdown-content">
                    <a href="<?= self::ADD_CHARACTER_URL ?>">Ajouter un personnage</a>
                    <a href="<?= self::MODIFY_CHARACTER_URL ?>">Modifier un personnage</a>
                    <a href="<?= self::DELETE_CHARACTER_URL ?>">Supprimer un personnage</a>
                </div>
            </div>

        </div>
        <?php
    }
}

?>
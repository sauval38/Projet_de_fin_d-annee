<?php
namespace Views;

class ButtonAdminViews {
    public function button() {
        echo'<div class="dropdown-container">
                <div class="dropdown">
                    <button class="lien">Jeux</button>
                    <div class="dropdown-content">
                        <a href="admin/ajouterunjeux">Ajouter un jeux</a>
                        <a href="">Modifier un jeux</a>
                        <a href="">Supprimer un jeux</a>
                    </div>
                </div>
                <div class="dropdown">
                    <button class="lien">Personnage</button>
                    <div class="dropdown-content">
                        <a href="">Ajouter un personnage</a>
                        <a href="">Modifier un personnage</a>
                        <a href="">Supprimer un personnage</a>
                    </div>
                </div>
            </div>';
    }
}
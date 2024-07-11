<?php
namespace Views; 

class ButtonAdminViews { 
  
  public function button() { 
    echo'<div class="dropdown-container">'; 
    
    echo '
      <div class="dropdown"> <!-- Début du dropdown -->
        <button class="lien">Jeux</button> <!-- Bouton "Jeux" -->
        <div class="dropdown-content"> <!-- Contenu du dropdown -->
          <a href="admin/ajouterunjeux">Ajouter un jeux</a> <!-- Option pour ajouter un jeu -->
          <a href="admin/modifierunjeux">Modifier un jeux</a> <!-- Option pour modifier un jeu -->
          <a href="">Supprimer un jeux</a> <!-- Option pour supprimer un jeu -->
        </div>
      </div>
    ';

    echo '
      <div class="dropdown"> <!-- Début du dropdown -->
        <button class="lien">Personnage</button> <!-- Bouton "Personnage" -->
        <div class="dropdown-content"> <!-- Contenu du dropdown -->
          <a href="">Ajouter un personnage</a> <!-- Option pour ajouter un personnage -->
          <a href="">Modifier un personnage</a> <!-- Option pour modifier un personnage -->
          <a href="">Supprimer un personnage</a> <!-- Option pour supprimer un personnage -->
        </div>
      </div>
    ';

    echo '</div>'; 
  }

}
?>

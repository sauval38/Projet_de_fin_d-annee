<?php
namespace Views; // Définit un espace de noms pour cette classe

class ButtonAdminViews { // Début de la déclaration de la classe ButtonAdminViews
  
  public function button() { // Début de la méthode publique button qui génère le code HTML des boutons d'administration
    
    echo'<div class="dropdown-container">'; // Début du conteneur de dropdown
    
    // Premier dropdown pour les jeux
    echo '
      <div class="dropdown"> <!-- Début du dropdown -->
        <button class="lien">Jeux</button> <!-- Bouton "Jeux" -->
        <div class="dropdown-content"> <!-- Contenu du dropdown -->
          <a href="admin/ajouterunjeux">Ajouter un jeux</a> <!-- Option pour ajouter un jeu -->
          <a href="">Modifier un jeux</a> <!-- Option pour modifier un jeu -->
          <a href="">Supprimer un jeux</a> <!-- Option pour supprimer un jeu -->
        </div>
      </div>
    ';

    // Deuxième dropdown pour les personnages
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

    echo '</div>'; // Fin du conteneur de dropdown
  }

}
?>

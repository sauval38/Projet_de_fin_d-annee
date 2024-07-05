<?php
namespace Views; // Définit un espace de noms pour cette classe

class ModifyGamesViews { // Début de la déclaration de la classe AddGamesViews
  
  public function update($games) { // Début de la méthode publique add qui génère le formulaire d'ajout de jeu
    foreach($games as $game){
    echo '
        <div class="form-container"> <!-- Début du conteneur de formulaire -->
            <h1 id="ajouter">Modifier un jeu</h1> <!-- Titre du formulaire -->
            <form class="form" action="admin/ajouterunjeux" method="post" enctype="multipart/form-data"> <!-- Début du formulaire avec enctype pour gérer les fichiers -->

                <label for="titles">Titres :</label> <!-- Champ pour le titre -->
                <input type="text" id="titles" name="titles" required value="' . $game['title_article'].'"> <!-- Champ de saisie pour le titre -->
                
                <label for="descriptions">Descriptions :</label> <!-- Champ pour la description -->
                <textarea id="descriptions" name="descriptions" required></textarea> <!-- Champ de saisie pour la description -->

                <label for="story">Histoires :</label> <!-- Champ pour le contenu -->
                <textarea id="story" name="story" required></textarea> <!-- Champ de saisie pour le contenu -->

                <label for="platforms">Plates-formes :</label> <!-- Champ pour les plates-formes -->
                <input type="text" id="platforms" name="platforms" required> <!-- Champ de saisie pour les plates-formes -->

                <label for="modes">Modes de jeux :</label> <!-- Champ pour le mode de jeu -->
                <input type="text" id="modes" name="modes" required> <!-- Champ de saisie pour le mode de jeu -->

                <label for="genres">Genres :</label> <!-- Champ pour les genres -->
                <input type="text" id="genres" name="genres" required> <!-- Champ de saisie pour les genres -->

                <label for="designers">Concepteurs :</label> <!-- Champ pour les concepteurs -->
                <input type="text" id="designers" name="designers" required> <!-- Champ de saisie pour les concepteurs -->

                <label for="developers">Développeurs :</label> <!-- Champ pour les développeurs -->
                <input type="text" id="developers" name="developers" required> <!-- Champ de saisie pour les développeurs -->

                <label for="editors">Éditeurs :</label> <!-- Champ pour les éditeurs -->
                <input type="text" id="editors" name="editors" required> <!-- Champ de saisie pour les éditeurs -->

                <label for="soundtrack">Bande-son :</label>
                <input type="text" id="soundtrack" name="soundtrack" required>

                <label for="gameplay">Gameplay :</label>
                <input type="text" id="gameplay" name="gameplay" required>

                <label for="dates">Dates de sortie :</label> <!-- Champ pour la date de sortie -->
                <input type="datetime-local" id="dates" name="dates" required> <!-- Champ de saisie pour la date de sortie -->
                
                <label for="images_path">Chemin de l\'image :</label> <!-- Champ pour le chemin de l\'image -->
                <input type="file" id="images_path" name="images_path" accept="image/*" required> <!-- Champ de téléchargement de fichier pour l\'image -->
                
                <input type="submit" value="Ajouter"> <!-- Bouton de soumission du formulaire -->
            </form>
        </div>
    ';
    }
  }
  
}
?>
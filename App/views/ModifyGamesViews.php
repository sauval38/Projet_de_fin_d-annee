<?php
namespace Views; // Définit un espace de noms pour cette classe

class ModifyGamesViews { // Début de la déclaration de la classe AddGamesViews
  
  public function updateForm($games) { // Début de la méthode publique add qui génère le formulaire d'ajout de jeu
    echo '
        <div class="form-container"> <!-- Début du conteneur de formulaire -->
            <h1 id="ajouter">Modifier un jeu</h1> <!-- Titre du formulaire -->
            <form class="form" method="post" enctype="multipart/form-data"> <!-- Début du formulaire avec enctype pour gérer les fichiers -->

                <input type="hidden" id="id_game" name="id_game" required value="' . $games['id'].'">
                <label for="titles">Titres :</label> <!-- Champ pour le titre -->
                <input type="text" id="titles" name="titles" required value="' . $games['titles_article'].'"> <!-- Champ de saisie pour le titre -->
                
                <label for="descriptions">Descriptions :</label> <!-- Champ pour la description -->
                <textarea id="descriptions" name="descriptions" required>' . $games['descriptions_article'].'</textarea> <!-- Champ de saisie pour la description -->

                <label for="story">Histoires :</label> <!-- Champ pour le contenu -->
                <textarea id="story" name="story" required>' . $games['story_article'].'</textarea> <!-- Champ de saisie pour le contenu -->

                <label for="platforms">Plates-formes :</label> <!-- Champ pour les plates-formes -->
                <input type="text" id="platforms" name="platforms" required value="' . $games['platforms_article'].'"> <!-- Champ de saisie pour les plates-formes -->

                <label for="modes">Modes de jeux :</label> <!-- Champ pour le mode de jeu -->
                <input type="text" id="modes" name="modes" required value="' . $games['modes_article'].'"> <!-- Champ de saisie pour le mode de jeu -->

                <label for="genres">Genres :</label> <!-- Champ pour les genres -->
                <input type="text" id="genres" name="genres" required value="' . $games['genres_article'].'"> <!-- Champ de saisie pour les genres -->

                <label for="designers">Concepteurs :</label> <!-- Champ pour les concepteurs -->
                <input type="text" id="designers" name="designers" required value="' . $games['designers_article'].'"> <!-- Champ de saisie pour les concepteurs -->

                <label for="developers">Développeurs :</label> <!-- Champ pour les développeurs -->
                <input type="text" id="developers" name="developers" required value="' . $games['developers_article'].'"> <!-- Champ de saisie pour les développeurs -->

                <label for="editors">Éditeurs :</label> <!-- Champ pour les éditeurs -->
                <input type="text" id="editors" name="editors" required value="' . $games['editors_article'].'"> <!-- Champ de saisie pour les éditeurs -->

                <label for="gameplay">Gameplay :</label>
                <textarea type="text" id="gameplay" name="gameplay" required>' . $games['gameplay_article'].'</textarea>

                <label for="informations">Information :</label>
                <textarea type="text" id="informations" name="informations" required>' . $games['informations_article'].'</textarea>

                <label for="dates">Dates de sortie :</label>
                <input type="date" id="dates" name="dates" required value="' . $games['dates_release'].'">

                <label for="images_path">Chemin de l\'image :</label>
                <input type="file" id="images_path" name="images_path" accept="image/*" required>
                
                <input type="submit" value="Ajouter"> <!-- Bouton de soumission du formulaire -->
            </form>
        </div>
    ';
    
  }
  
}
?>
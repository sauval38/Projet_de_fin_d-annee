<?php

namespace Views; // Définit un espace de noms pour cette classe

class HomeViews { // Début de la déclaration de la classe HomeViews
  
  public function body() { // Début de la méthode publique body qui génère le contenu de la page d'accueil
    
    echo '
      <h1 id="logo">SQUARE ENIX</h1> <!-- Affiche le titre principal de la page -->
      <div class="carousel"> <!-- Début du carousel -->
        <div class="carousel-slides"> <!-- Conteneur des diapositives -->
          <div id="slide-1" class="slide"> <!-- Première diapositive -->
            <img src="./assets/images/image_d_accueil.webp" alt="image1"> <!-- Image de la première diapositive -->
            <h1 class="carousel-title">Bienvenue dans l\'univers de Final Fantasy</h1> <!-- Titre de la première diapositive -->
          </div>
          <div id="slide-2" class="slide"> <!-- Deuxième diapositive -->
            <img src="./assets/images/image_d_accueil_2.webp" alt="image2"> <!-- Image de la deuxième diapositive -->
            <h1 class="carousel-title">Bienvenue dans l\'univers de Final Fantasy</h1> <!-- Titre de la deuxième diapositive -->
          </div>
          <div id="slide-3" class="slide"> <!-- Troisième diapositive -->
            <img src="./assets/images/image_d_accueil_3.webp" alt="image3"> <!-- Image de la troisième diapositive -->
            <h1 class="carousel-title">Bienvenue dans l\'univers de Final Fantasy</h1> <!-- Titre de la troisième diapositive -->
          </div>
        </div>
        <button class="carousel-button carousel-button-prev" aria-label="Previous Slide">&laquo;</button> <!-- Bouton précédent du carousel -->
        <button class="carousel-button carousel-button-next" aria-label="Next Slide">&raquo;</button> <!-- Bouton suivant du carousel -->
      </div> <!-- Fin du carousel -->
      
      <h2>Découvrez l\'Épopée Légendaire de Final Fantasy</h2> <!-- Sous-titre -->
      <div class="presentation-container"> <!-- Conteneur de présentation -->
        <div class="presentation"> <!-- Contenu de présentation -->
          <div class="section"> <!-- Première section -->
            <h3>Une Histoire Riche et Diversifiée</h3> <!-- Titre de la première section -->
            <p>
              Chaque titre de Final Fantasy nous plonge dans un nouvel univers, avec une histoire unique et des héros courageux. 
              Que ce soit les luttes pour sauver le monde dans <em>Final Fantasy VII</em>, les quêtes de rédemption dans <em>Final Fantasy X</em>, 
              ou les batailles royales dans <em>Final Fantasy XV</em>, la série offre une diversité narrative incomparable.
            </p> <!-- Description de la première section -->
          </div>
          <div class="section"> <!-- Deuxième section -->
            <h3>Des Personnages Inoubliables</h3> <!-- Titre de la deuxième section -->
            <p>
              La série est renommée pour ses personnages emblématiques, tels que Cloud Strife, Squall Leonhart, et Noctis Lucis Caelum. 
              Chacun apporte une profondeur émotionnelle et une complexité qui résonnent avec les joueurs du monde entier.
            </p> <!-- Description de la deuxième section -->
          </div>
          <div class="section"> <!-- Troisième section -->
            <h3>Un Univers Musical Envoûtant</h3> <!-- Titre de la troisième section -->
            <p>
              La musique de Final Fantasy, composée par des artistes légendaires comme Nobuo Uematsu, est une composante essentielle de l\'expérience de jeu. 
              Des mélodies enchanteresses de <em>Final Fantasy VI</em> aux thèmes épiques de <em>Final Fantasy XIV</em>, la bande-son de la série est à la fois variée et inoubliable.
            </p> <!-- Description de la troisième section -->
          </div>
          <div class="section"> <!-- Quatrième section -->
            <h3>Innovation et Evolution</h3> <!-- Titre de la quatrième section -->
            <p>
              Final Fantasy est également reconnu pour son innovation constante. La série a introduit des systèmes de combat révolutionnaires, des graphismes de pointe et 
              des mécaniques de jeu immersives. De l\'ère des pixels à la réalité virtuelle, Final Fantasy continue de repousser les limites du possible dans le jeu vidéo.
            </p> <!-- Description de la quatrième section -->
          </div>
          <div class="section"> <!-- Cinquième section -->
            <h3>Un Impact Culturel Mondial</h3> <!-- Titre de la cinquième section -->
            <p>
              Plus qu\'une simple série de jeux, Final Fantasy est un phénomène culturel mondial. Avec des adaptations en films, en séries animées, 
              et en concerts symphoniques, l\'influence de la série s\'étend bien au-delà du domaine du jeu vidéo.
            </p> <!-- Description de la cinquième section -->
          </div>
          <div class="section"> <!-- Sixième section -->
            <h3>Rejoignez l\'Aventure</h3> <!-- Titre de la sixième section -->
            <p>
              Que vous soyez un vétéran de longue date ou un nouveau venu curieux, l\'univers de Final Fantasy vous invite à découvrir ses histoires captivantes, 
              ses personnages attachants, et ses mondes merveilleux. Plongez dans l\'aventure et laissez-vous emporter par la magie de Final Fantasy.
              <br><a target="_blank" href="https://www.square-enix-games.com/fr_FR/search/final%20fantasy">Rechercher Final Fantasy sur Square Enix</a> 
            </p> <!-- Description de la sixième section -->
          </div>
        </div> <!-- Fin du contenu de présentation -->
      </div> <!-- Fin du conteneur de présentation -->
      <script src="./assets/js/home.js"></script> <!-- Inclusion du fichier JavaScript -->
    ';
  }

}
?>

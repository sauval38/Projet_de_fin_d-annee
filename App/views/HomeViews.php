<?php

namespace Views;

// Déclaration de la classe HomeViews dans l'espace de noms Views
class HomeViews {

    // Méthode pour générer le contenu de la page d'accueil
    public function body($data) {

        // Déclaration d'un tableau contenant les diapositives du carrousel
        $slides = [
            [
                'image' => htmlspecialchars($data['slide_1_image']),  // Sécurisation de l'image de la première diapositive
                'title' => htmlspecialchars($data['slide_1_title'])   // Sécurisation du titre de la première diapositive
            ],
            [
                'image' => htmlspecialchars($data['slide_2_image']),  // Sécurisation de l'image de la deuxième diapositive
                'title' => htmlspecialchars($data['slide_2_title'])   // Sécurisation du titre de la deuxième diapositive
            ],
            [
                'image' => htmlspecialchars($data['slide_3_image']),  // Sécurisation de l'image de la troisième diapositive
                'title' => htmlspecialchars($data['slide_3_title'])   // Sécurisation du titre de la troisième diapositive
            ]
        ];

        // Déclaration d'un tableau contenant les sections de présentation
        $sections = [
            [
                'title' => 'Une Histoire Riche et Diversifiée', // Titre de la première section
                'content' => 'Chaque titre de Final Fantasy nous plonge dans un nouvel univers, avec une histoire unique et des héros courageux. Que ce soit les luttes pour sauver le monde dans <em>Final Fantasy VII</em>, les quêtes de rédemption dans <em>Final Fantasy X</em>, ou les batailles royales dans <em>Final Fantasy XV</em>, la série offre une diversité narrative incomparable.' // Contenu de la première section
            ],
            [
                'title' => 'Des Personnages Inoubliables', // Titre de la deuxième section
                'content' => 'La série est renommée pour ses personnages emblématiques, tels que Cloud Strife, Squall Leonhart, et Noctis Lucis Caelum. Chacun apporte une profondeur émotionnelle et une complexité qui résonnent avec les joueurs du monde entier.' // Contenu de la deuxième section
            ],
            [
                'title' => 'Un Univers Musical Envoûtant', // Titre de la troisième section
                'content' => 'La musique de Final Fantasy, composée par des artistes légendaires comme Nobuo Uematsu, est une composante essentielle de l\'expérience de jeu. Des mélodies enchanteresses de <em>Final Fantasy VI</em> aux thèmes épiques de <em>Final Fantasy XIV</em>, la bande-son de la série est à la fois variée et inoubliable.' // Contenu de la troisième section
            ],
            [
                'title' => 'Innovation et Evolution', // Titre de la quatrième section
                'content' => 'Final Fantasy est également reconnu pour son innovation constante. La série a introduit des systèmes de combat révolutionnaires, des graphismes de pointe et des mécaniques de jeu immersives. De l\'ère des pixels à la réalité virtuelle, Final Fantasy continue de repousser les limites du possible dans le jeu vidéo.' // Contenu de la quatrième section
            ],
            [
                'title' => 'Un Impact Culturel Mondial', // Titre de la cinquième section
                'content' => 'Plus qu\'une simple série de jeux, Final Fantasy est un phénomène culturel mondial. Avec des adaptations en films, en séries animées, et en concerts symphoniques, l\'influence de la série s\'étend bien au-delà du domaine du jeu vidéo.' // Contenu de la cinquième section
            ],
            [
                'title' => 'Rejoignez l\'Aventure', // Titre de la sixième section
                'content' => 'Que vous soyez un vétéran de longue date ou un nouveau venu curieux, l\'univers de Final Fantasy vous invite à découvrir ses histoires captivantes, ses personnages attachants, et ses mondes merveilleux. Plongez dans l\'aventure et laissez-vous emporter par la magie de Final Fantasy. <br><a target="_blank" href="https://www.square-enix-games.com/fr_FR/search/final%20fantasy">Rechercher Final Fantasy sur Square Enix</a>' // Contenu de la sixième section avec lien externe
            ]
        ];

        ?>
        
        <!-- Conteneur principal pour le carrousel d'images -->
        <div id="carousel">
            <!-- Titre principal du site -->
            <h1>FINALSTORY</h1>
            <div class="carousel-slides">
                <?php 
                // Itération sur chaque diapositive du carrousel
                foreach ($slides as $index => $slide): ?>
                    <!-- Conteneur pour une diapositive spécifique -->
                    <div id="slide-<?php echo $index + 1; ?>" class="slide">
                        <!-- Affichage de l'image de la diapositive -->
                        <img src="<?php echo $slide['image']; ?>" alt="image<?php echo $index + 1; ?>">
                        <!-- Titre de la diapositive -->
                        <h1 class="carousel-title"><?php echo $slide['title']; ?></h1>
                    </div>
                <?php endforeach; ?>
            </div>

            <!-- Bouton pour passer à la diapositive précédente -->
            <button class="carousel-button carousel-button-prev" aria-label="Previous Slide">&laquo;</button>
            <!-- Bouton pour passer à la diapositive suivante -->
            <button class="carousel-button carousel-button-next" aria-label="Next Slide">&raquo;</button>
        </div>

        
        <!-- Conteneur pour la présentation des sections -->
        <div class="presentation-container">
            <!-- Titre pour la section de présentation -->
            <h2>Découvrez l'Épopée Légendaire de Final Fantasy</h2>
            <div class="presentation">
                <?php 
                // Itération sur chaque section de présentation
                foreach ($sections as $section): ?>
                    <!-- Conteneur pour une section de présentation -->
                    <div class="section">
                        <!-- Titre de la section -->
                        <h3><?= $section['title']; ?></h3>
                        <!-- Contenu de la section -->
                        <p><?= $section['content']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <!-- Inclusion du fichier JavaScript pour le carrousel -->
        <script src="./assets/js/home.js"></script>
        <?php
    }
}

?>

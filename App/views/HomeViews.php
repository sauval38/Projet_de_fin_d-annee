<?php

namespace Views;

class HomeViews {

    public function body($data) {
        
        $slides = [
            [
                'image' => htmlspecialchars($data['slide_1_image']),
                'title' => htmlspecialchars($data['slide_1_title'])
            ],
            [
                'image' => htmlspecialchars($data['slide_2_image']),
                'title' => htmlspecialchars($data['slide_2_title'])
            ],
            [
                'image' => htmlspecialchars($data['slide_3_image']),
                'title' => htmlspecialchars($data['slide_3_title'])
            ]
        ];

        $sections = [
            [
                'title' => 'Une Histoire Riche et Diversifiée',
                'content' => 'Chaque titre de Final Fantasy nous plonge dans un nouvel univers, avec une histoire unique et des héros courageux. Que ce soit les luttes pour sauver le monde dans <em>Final Fantasy VII</em>, les quêtes de rédemption dans <em>Final Fantasy X</em>, ou les batailles royales dans <em>Final Fantasy XV</em>, la série offre une diversité narrative incomparable.'
            ],
            [
                'title' => 'Des Personnages Inoubliables',
                'content' => 'La série est renommée pour ses personnages emblématiques, tels que Cloud Strife, Squall Leonhart, et Noctis Lucis Caelum. Chacun apporte une profondeur émotionnelle et une complexité qui résonnent avec les joueurs du monde entier.'
            ],
            [
                'title' => 'Un Univers Musical Envoûtant',
                'content' => 'La musique de Final Fantasy, composée par des artistes légendaires comme Nobuo Uematsu, est une composante essentielle de l\'expérience de jeu. Des mélodies enchanteresses de <em>Final Fantasy VI</em> aux thèmes épiques de <em>Final Fantasy XIV</em>, la bande-son de la série est à la fois variée et inoubliable.'
            ],
            [
                'title' => 'Innovation et Evolution',
                'content' => 'Final Fantasy est également reconnu pour son innovation constante. La série a introduit des systèmes de combat révolutionnaires, des graphismes de pointe et des mécaniques de jeu immersives. De l\'ère des pixels à la réalité virtuelle, Final Fantasy continue de repousser les limites du possible dans le jeu vidéo.'
            ],
            [
                'title' => 'Un Impact Culturel Mondial',
                'content' => 'Plus qu\'une simple série de jeux, Final Fantasy est un phénomène culturel mondial. Avec des adaptations en films, en séries animées, et en concerts symphoniques, l\'influence de la série s\'étend bien au-delà du domaine du jeu vidéo.'
            ],
            [
                'title' => 'Rejoignez l\'Aventure',
                'content' => 'Que vous soyez un vétéran de longue date ou un nouveau venu curieux, l\'univers de Final Fantasy vous invite à découvrir ses histoires captivantes, ses personnages attachants, et ses mondes merveilleux. Plongez dans l\'aventure et laissez-vous emporter par la magie de Final Fantasy. <br><a target="_blank" href="https://www.square-enix-games.com/fr_FR/search/final%20fantasy">Rechercher Final Fantasy sur Square Enix</a>'
            ]
        ];

        ?>
        <h1 id="logo">SQUARE ENIX</h1>
        <div id="carousel">
            <div class="carousel-slides">
                <?php foreach ($slides as $index => $slide): ?>
                    <div id="slide-<?php echo $index + 1; ?>" class="slide">
                        <img src="<?php echo $slide['image']; ?>" alt="image<?php echo $index + 1; ?>">
                        <h1 class="carousel-title"><?php echo $slide['title']; ?></h1>
                    </div>
                <?php endforeach; ?>
            </div>

            <button class="carousel-button carousel-button-prev" aria-label="Previous Slide">&laquo;</button>
            <button class="carousel-button carousel-button-next" aria-label="Next Slide">&raquo;</button>
        </div>

        <h2>Découvrez l'Épopée Légendaire de Final Fantasy</h2>
        <div class="presentation-container">
            <div class="presentation">
                <?php foreach ($sections as $section): ?>
                    <div class="section">
                        <h3><?= $section['title']; ?></h3>
                        <p><?= $section['content']; ?></p>
                    </div>
                <?php endforeach; ?>
            </div>
        </div>

        <script src="./assets/js/home.js"></script>
        <?php
    }
}

?>
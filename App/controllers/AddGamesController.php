<?php
namespace Controllers;

use Views\AddGamesViews;
use Models\AddGamesModels;

class AddGamesController {
    protected $addGamesViews;
    protected $addGamesModels;

    public function __construct() {
        $this->addGamesViews = new AddGamesViews();
        $this->addGamesModels = new AddGamesModels();
    }

    public function addGames() {
        $this->addGamesViews->add();
    }

    public function addGame() {
        
        if (isset($_POST) && isset($_FILES["images_path"])) {

            $titles_article = $_POST["titles"];
            $descriptions_article = $_POST["descriptions"];
            $story_article = $_POST["story"];
            $platforms_article = $_POST["platforms"];
            $modes_article = $_POST["modes"];
            $genres_article = $_POST["genres"];
            $designers_article = $_POST["designers"];
            $developers_article = $_POST["developers"];
            $editors_article = $_POST["editors"];
            $gameplay_article = $_POST["gameplay"];
            $informations_article = $_POST["informations"];
            $dates_release = $_POST["dates"];
            $images_article = $_FILES["images_path"]; 
            $path = 'assets/images/';

          $this->addGamesModels->addGameWithImage($titles_article, $descriptions_article, $story_article, $platforms_article, $modes_article, $genres_article, $designers_article, $developers_article, $editors_article, $gameplay_article, $informations_article, $dates_release, $images_article, $path);
        } 
        else {
            echo "Veuillez fournir tous les champs nécessaires.";
        }
    }
}
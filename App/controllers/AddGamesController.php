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
        
        if (isset($_POST) && isset($_FILES["image_path"])) {

            $title_article = $_POST["title"];
            $description_article = $_POST["description"];
            $contents_article = $_POST["contents"];
            $platforms_article = $_POST["platforms"];
            $mode_article = $_POST["mode"];
            $genres_article = $_POST["genres"];
            $designers_article = $_POST["designers"];
            $developers_article = $_POST["developers"];
            $editors_article = $_POST["editors"];
            $date_release = $_POST["date"];
            $image_article = $_FILES["image_path"]; 
            $path = 'assets/images/';

          $this->addGamesModels->addGameWithImage($title_article, $description_article, $contents_article, $platforms_article, $mode_article, $genres_article, $designers_article, $developers_article, $editors_article, $date_release, $image_article, $path);
        } 
        else {
            echo "Veuillez fournir tous les champs nécessaires.";
        }
    }
}
<?php

namespace AdminControllers;

use AdminViews\AddCharacterViews;
use AdminModels\AddCharacterModels;

class AddCharacterController {
    protected $addCharacterViews;
    protected $addCharacterModels;

    public function __construct() {
        $this->addCharacterViews = new AddCharacterViews();
        $this->addCharacterModels = new AddCharacterModels();
    }
    public function addCharacter() {
        $titles = $this->addCharacterModels->getTitles();
        $this->addCharacterViews->addCharacterViews($titles);
    }
    public function addCharacterImage() {

        if (isset($_POST) && isset($_FILES["images_path"])) {

            $games_id = $_POST["titles"];
            $names_character = $_POST["names"];
            $descriptions_character = $_POST["descriptions"];
            $jobs_character = $_POST["jobs"];
            $limits_break_character = $_POST["limits_break"];
            $age_character = $_POST["age"];
            $armed_character = $_POST["armed"];
            $size_character = str_replace(",",".", $_POST["size"]);
            $date_o_birth_character = $_POST["date_o_birth"];
            $place_of_birth_character = $_POST["place_of_birth"];
            $images_character = $_FILES["images_path"];
            $path = 'assets/images/';

            $this->addCharacterModels->addCharacterWithImage($games_id, $names_character, $descriptions_character, $jobs_character, $limits_break_character, $age_character, $armed_character, $size_character, $date_o_birth_character, $place_of_birth_character, $images_character, $path);
        }
    else {
        echo "Veuillez fournir tous les champs nécessaires.";
        }
    }
} 
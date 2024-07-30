<?php
namespace Controllers;

use Views\AddBossViews;
use Models\AddBossModels;

class AddBossController {
    protected $addBossViews;
    protected $addBossModels;

    public function __construct() {
        $this->addBossViews = new AddBossViews();
        $this->addBossModels = new AddBossModels(); 
    }

    public function addBoss() {
        $titles = $this->addBossModels->getTitles();
        $this->addBossViews->addBossViews($titles);
    }

    public function addBossImage() {
        if (isset($_POST) && isset($_FILES["images_path"])) {

            $games_id = $_POST["titles"];
            $names_boss = $_POST["names"];
            $descriptions_boss = $_POST["descriptions"];
            $HP_boss = $_POST["HP"];
            $MP_boss = $_POST["MP"];
            $loots_boss = $_POST["loots"];
            $weakness_boss = $_POST["weakness"];
            $location_boss = $_POST["location"];
            $gils_boss = $_POST["gils"];
            $experiences_boss = $_POST["experiences"];
            $images_boss = $_FILES["images_path"];
            $path = 'assets/images/';

            $this->addBossModels->addBossWithImage($games_id, $names_boss,  $descriptions_boss, $HP_boss, $MP_boss, $loots_boss, $weakness_boss, $location_boss, $gils_boss, $experiences_boss,  $images_boss, $path);
        }
        else {
            echo "Veuillez fournir tous les champs nécessaires.";
            }
        }
    } 
<?php
namespace Controllers;

use Models\RegisterModels;
use Views\RegisterViews;

class RegisterController {
    protected $registerModels;
    protected $registerViews;

    public function __construct() {
        $this->registerModels = new RegisterModels();
        $this->registerViews = new RegisterViews();
    }
    public function registerViews() {
        $this->registerViews->initForm();
    }
    public function userSave() {
        $this->registerModels->createUser();
    }
}
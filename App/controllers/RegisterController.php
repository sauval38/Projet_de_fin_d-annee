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
    public function registerController() {
        $this->registerViews->registerFormView();
    }
    public function userSaveController() {
        $this->registerModels->createUserModels();
    }
}
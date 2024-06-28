<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

use Controllers\RegisterController;
use Controllers\LoginController;
use Controllers\HomeController;
use Controllers\AddGamesController;
use App\Database;
use Controllers\ButtonAdminController;
use Controllers\GamesController;

$pdo = new Database;

$action = $_REQUEST['action'] ?? null;
$step = $_REQUEST['step'] ?? null;

switch($action) {
    default:
        $homeController = new HomeController();
        $homeController->home();
        break;
        
    case 'admin':
        $buttonAdminController = new ButtonAdminController();
        $buttonAdminController->boutton();
        switch ($step) {
            case 'ajouterunjeux':
                $addGamesController = new AddGamesController();
                if ($_SERVER['REQUEST_METHOD'] === 'POST')   
                { 
                    $addGamesController->addGame();
                } else {
                    $addGamesController->addGames();
                }
                break;
            case 'modifier':
                
                break;
            case 'supprimer':
                
                break;
        }
        break;

    case 'games';
        $gamesController = new GamesController();
        $gamesController->gamList();
        break;  

    case 'inscription':
        $registerController = new RegisterController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $registerController->userSave();
        } else {
            $registerController->registerViews();
        }
        break;

    case 'login':
        $loginController = new LoginController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $loginController->showLoginForm();
        } else {
            $loginController->loginViews();
        }
        break;

    case 'logout':
        $loginController = new LoginController();
        $loginController->logout();
        break;
}
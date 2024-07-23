<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

use App\Database;
use Controllers\AddCharacterController;
use Controllers\RegisterController;
use Controllers\LoginController;
use Controllers\HomeController;
use Controllers\AddGamesController;
use Controllers\ButtonAdminController;
use Controllers\ListGamesController;
use Controllers\GamesController;
use Controllers\ListModifyGamesController;
use Controllers\ModifyGamesController;
use Controllers\StoryController;
use Controllers\CharacterController;
use Controllers\ListDeleteGamesController;

$pdo = new Database;
$id = $_REQUEST['id'] ?? null;
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
            case 'addGames':
                $addGamesController = new AddGamesController();
                if ($_SERVER['REQUEST_METHOD'] === 'POST')   
                { 
                    $addGamesController->addGame();
                } else {
                    $addGamesController->addGames();
                }
                break;
            case 'modifyGames':
                if ($id){
                    $modifyGamesController = new ModifyGamesController;
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        $modifyGamesController->updateGames();
                    } else {
                        $modifyGamesController->modifyGames();
                    } 
                } else {
                    $modifylistGamesController = new ListModifyGamesController;
                    $modifylistGamesController->listModifyGames();
                }
                break;
                case 'deleteGames':
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['game_id'])) {
                        $gameId = $_POST['game_id'];
                        $listDeleteGamesController = new ListDeleteGamesController();
                        $listDeleteGamesController->deleteGame($gameId);
                    } else {
                        $listDeleteGamesController = new ListDeleteGamesController();
                        $listDeleteGamesController->listGamesDelete();
                    }
                    break;
            case'addCharacter': 
                    $addCharacterController = new AddCharacterController;
                    if ($_SERVER['REQUEST_METHOD'] === 'POST')
                    {
                        $addCharacterController->addCharacterImage();
                    } else {
                        $addCharacterController->addCharacter();
                    }
                break;
        }
        break;

    case 'listgames';
        $listGamesController = new ListGamesController();
        $listGamesController->gamList();
    break; 
    
    case 'games';
        $gamesController = new GamesController();
        if ($id){
            $gamesController->game();
        }
    break; 

    case 'story';
        $storyController = new StoryController();
        if ($id){
            $storyController->story();
        }
    break;
    
    case 'character';
        $characterController = new CharacterController();
        $characterController->character();
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
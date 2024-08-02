<?php
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

require_once('vendor/autoload.php');

use App\Database;
use Controllers\AddBossController;
use Controllers\AddCharacterController;
use Controllers\AddGamesController;
use Controllers\BossController;
use Controllers\ButtonAdminController;
use Controllers\CharacterController;
use Controllers\DeleteBossController;
use Controllers\DeleteCharacterController;
use Controllers\DeleteGamesController;
use Controllers\GamesController;
use Controllers\HomeController;
use Controllers\ListBossController;
use Controllers\ListCharacterController;
use Controllers\ListDeleteCharacterController;
use Controllers\ListDeleteBossController;
use Controllers\ListGamesController;
use Controllers\ListModifyBossController;
use Controllers\ListModifyCharacterController;
use Controllers\ListModifyGamesController;
use Controllers\LoginController;
use Controllers\ModifyBossController;
use Controllers\ModifyCharacterController;
use Controllers\ModifyGamesController;
use Controllers\RegisterController;
use Controllers\StoryController;

$pdo = new Database;
$id = $_REQUEST['id'] ?? null;
$game_id = $_REQUEST['gameId'] ?? null;
$action = $_REQUEST['action'] ?? null;
$step = $_REQUEST['step'] ?? null;
$characterId = $_REQUEST['characterId'] ?? null;
$bossId = $_REQUEST['bossId'] ?? null;

switch($action) {
    default:
        $homeController = new HomeController();
        $homeController->home();
        break;
        
    case 'admin':
        if ($_SESSION['role'] === 'admin') {
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
                            $modifyGamesController->updateGamesController();
                        } else {
                            $modifyGamesController->modifyGamesController();
                        } 
                    } else {
                        $modifylistGamesController = new ListModifyGamesController;
                        $modifylistGamesController->listModifyGames();
                    }
                    break;
                    case 'deleteGames':
                        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['game_id'])) {
                            $gameId = $_POST['game_id'];
                            $deleteGamesController = new DeleteGamesController();
                            $deleteGamesController->deleteGame($gameId);
                        } else {
                            $deleteGamesController = new DeleteGamesController();
                            $deleteGamesController->listGamesDelete();
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
                    case'modifyCharacter':
                        if ($id && $characterId) {
                            $modifyCharacterController = new modifyCharacterController;
                            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                $modifyCharacterController->updateGames();
                            } else {
                                $modifyCharacterController->modifyCharacter($characterId);
                            }
                        } else if ($id) {
                            $listCharacterController = new ListCharacterController;
                            $listCharacterController->listModifyCharacter($id);
                        } else {
                            $modifylistCharacterController = new ListModifyCharacterController;
                            $modifylistCharacterController->listModifyCharacter();
                        }
                        break;
                        case 'deleteCharacter':
                            if ($game_id) {
                                $deleteCharacterController = new DeleteCharacterController();
                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    $deleteCharacterController->deleteCharacter();
                                } else {
                                    $deleteCharacterController->listCharacterDelete($game_id);
                                }
                            } else {
                                $listDeleteCharacterController = new ListDeleteCharacterController();
                                $listDeleteCharacterController->listDeleteCharacter();
                            }
                            break;
                        case 'addBoss':
                            $addBossController = new AddBossController();
                            if ($_SERVER['REQUEST_METHOD'] === 'POST')   
                                { 
                                    $addBossController->addBossImage();
                                } else {
                                    $addBossController->addBoss();
                                }
                            break; 

                        case 'modifyBoss':
                            if ($id && $bossId){
                                $modifyBossController = new ModifyBossController;
                                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                    $modifyBossController->updateBossController();
                                } else {
                                    $modifyBossController->modifyBossController($bossId);
                                } 
                                } else if ($id) {
                                    $listBossController = new ListBossController;
                                    $listBossController->listModifyBoss($id);
                                } else {
                                    $modifylistBossController = new ListModifyBossController;
                                    $modifylistBossController->listModifyBoss();
                                } 
                            break; 
                            case 'deleteBoss':
                                if ($game_id) {
                                    $deleteBossController = new DeleteBossController();
                                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                                        $deleteBossController->deleteBoss();
                                    } else {
                                        $deleteBossController->listBossDelete($game_id);
                                    }
                                } else {
                                    $listDeleteBossController = new ListDeleteBossController();
                                    $listDeleteBossController->listBossCharacter();
                                }
                                break;                           
            }
        } else {
            header('Location: ./');
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
            $storyController->storyController();
        }
    break;
    
    case 'character';
        $characterController = new CharacterController();
        $characterController->character();
    break;  
    
    case 'boss';
        $bossController = new BossController();
        $bossController->boss();
    break;

    case 'register':
        $registerController = new RegisterController();
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $registerController->userSaveController();
        } else {
            $registerController->registerController();
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
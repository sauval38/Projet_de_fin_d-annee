<?php

// Active l'affichage des erreurs, utile pour le débogage.
ini_set('display_errors', 1);
// Active l'affichage des erreurs lors du démarrage de PHP, utile pour le débogage.
ini_set('display_startup_errors', 1);
// Définit le niveau de rapport d'erreurs à E_ALL, ce qui signifie que toutes les erreurs et avertissements seront affichés.
error_reporting(E_ALL);

// Charge le fichier autoload de Composer, qui gère automatiquement le chargement des classes utilisées dans le projet.
require_once('vendor/autoload.php');

// Importation des classes du namespace `App` et `Controllers` pour les utiliser dans le script.
// Cette ligne importe la classe `Database` située dans le namespace `App`.
use App\Database;

// Importation des contrôleurs du namespace `Controllers` pour les utiliser dans le script.
// Chacune de ces lignes importe une classe correspondant à un contrôleur spécifique qui gère une partie de la logique de l'application.
use Controllers\AddBossController;
use Controllers\AddCharacterController;
use Controllers\AddGamesController;
use Controllers\AdminBoardController;
use Controllers\BossController;
use Controllers\ButtonAdminController;
use Controllers\CharacterController;
use Controllers\DeleteBossController;
use Controllers\DeleteCharacterController;
use Controllers\DeleteGamesController;
use Controllers\GamesController;
use Controllers\HomeController;
use Controllers\LegalNoticesController;
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
use Controllers\PrivacyPolicyController;
use Controllers\RegisterController;
use Controllers\StoryController;

// Crée une nouvelle instance de la classe `Database` et l'assigne à la variable `$pdo`.
// Cette instance est généralement utilisée pour interagir avec la base de données.
$pdo = new Database;

// Récupère la valeur du paramètre 'id' depuis la requête (GET ou POST). 
// Si le paramètre 'id' n'existe pas, la valeur par défaut sera `null`.
$id = $_REQUEST['id'] ?? null;

// Récupère la valeur du paramètre 'gameId' depuis la requête (GET ou POST). 
// Si le paramètre 'gameId' n'existe pas, la valeur par défaut sera `null`.
$game_id = $_REQUEST['gameId'] ?? null;

// Récupère la valeur du paramètre 'action' depuis la requête (GET ou POST). 
// Si le paramètre 'action' n'existe pas, la valeur par défaut sera `null`.
$action = $_REQUEST['action'] ?? null;

// Récupère la valeur du paramètre 'step' depuis la requête (GET ou POST). 
// Si le paramètre 'step' n'existe pas, la valeur par défaut sera `null`.
$step = $_REQUEST['step'] ?? null;

// Récupère la valeur du paramètre 'characterId' depuis la requête (GET ou POST). 
// Si le paramètre 'characterId' n'existe pas, la valeur par défaut sera `null`.
$characterId = $_REQUEST['characterId'] ?? null;

// Récupère la valeur du paramètre 'bossId' depuis la requête (GET ou POST). 
// Si le paramètre 'bossId' n'existe pas, la valeur par défaut sera `null`.
$bossId = $_REQUEST['bossId'] ?? null;


// Début du bloc switch qui va gérer différentes actions en fonction de la valeur de la variable $action
switch($action) {
    
    // Cas par défaut : si $action ne correspond à aucun autre cas, on exécute ce bloc
    default:
        // Instancie un objet de la classe HomeController
        $homeController = new HomeController();
        // Appelle la méthode 'home' de l'objet $homeController
        $homeController->home();
        // Termine l'exécution du switch avec l'instruction break
        break;
    
    // Cas où $action est égal à 'admin'
    case 'admin':
        // Vérifie si le rôle de l'utilisateur en session est 'admin'
        if ($_SESSION['role'] === 'admin') {
            // Instancie un objet de la classe ButtonAdminController
            $buttonAdminController = new ButtonAdminController();
            // Appelle la méthode 'boutton' de l'objet $buttonAdminController
            $buttonAdminController->boutton();
            
            // Si la variable $step est vide
            if ($step == "") {
                // Instancie un objet de la classe AdminBoardController
                $adminBoardController = new AdminBoardController();
                
                // Si la requête HTTP est de type POST
                if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                    // Appelle la méthode 'updateRole' de l'objet $adminBoardController
                    $adminBoardController->updateRole();
                    // Affiche un message indiquant que le rôle a été mis à jour
                    echo 'role mis a jour';
                }
                
                // Appelle la méthode 'getUser' de l'objet $adminBoardController
                $adminBoardController->getUser();
            }
            
            // Nouveau bloc switch pour gérer les différentes étapes administratives
            switch ($step) {
                // Cas où $step est égal à 'addGames'
                case 'addGames':
                    // Instancie un objet de la classe AddGamesController
                    $addGamesController = new AddGamesController();
                    
                    // Si la requête HTTP est de type POST
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
                        // Appelle la méthode 'addGame' de l'objet $addGamesController pour ajouter un jeu
                        $addGamesController->addGame();
                    } else {
                        // Sinon, appelle la méthode 'addGames' pour afficher le formulaire d'ajout
                        $addGamesController->addGames();
                    }
                    // Termine l'exécution de ce cas
                    break;
                
                // Cas où $step est égal à 'modifyGames'
                case 'modifyGames':
                    // Si une variable $id est définie
                    if ($id) {
                        // Instancie un objet de la classe ModifyGamesController
                        $modifyGamesController = new ModifyGamesController();
                        
                        // Si la requête HTTP est de type POST
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Appelle la méthode 'updateGamesController' pour mettre à jour le jeu
                            $modifyGamesController->updateGamesController();
                        } else {
                            // Sinon, affiche le formulaire de modification du jeu
                            $modifyGamesController->modifyGamesController();
                        } 
                    } else {
                        // Si $id n'est pas défini, instancie un objet de la classe ListModifyGamesController
                        $modifylistGamesController = new ListModifyGamesController();
                        // Appelle la méthode 'listModifyGames' pour afficher la liste des jeux à modifier
                        $modifylistGamesController->listModifyGames();
                    }
                    // Termine l'exécution de ce cas
                    break;
                
                // Cas où $step est égal à 'deleteGames'
                case 'deleteGames':
                    // Si la requête HTTP est de type POST et que l'identifiant du jeu est défini
                    if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['game_id'])) {
                        // Récupère l'identifiant du jeu depuis le formulaire
                        $gameId = $_POST['game_id'];
                        // Instancie un objet de la classe DeleteGamesController
                        $deleteGamesController = new DeleteGamesController();
                        // Appelle la méthode 'deleteGame' pour supprimer le jeu
                        $deleteGamesController->deleteGame($gameId);
                    } else {
                        // Sinon, affiche la liste des jeux à supprimer
                        $deleteGamesController = new DeleteGamesController();
                        $deleteGamesController->listGamesDelete();
                    }
                    // Termine l'exécution de ce cas
                    break;
                
                // Cas où $step est égal à 'addCharacter'
                case 'addCharacter': 
                    // Instancie un objet de la classe AddCharacterController
                    $addCharacterController = new AddCharacterController();
                    
                    // Si la requête HTTP est de type POST
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                        // Appelle la méthode 'addCharacterImage' pour ajouter une image de personnage
                        $addCharacterController->addCharacterImage();
                    } else {
                        // Sinon, appelle la méthode 'addCharacter' pour afficher le formulaire d'ajout
                        $addCharacterController->addCharacter();
                    }
                    // Termine l'exécution de ce cas
                    break;
                
                // Cas où $step est égal à 'modifyCharacter'
                case 'modifyCharacter':
                    // Si $id et $characterId sont définis
                    if ($id && $characterId) {
                        // Instancie un objet de la classe modifyCharacterController
                        $modifyCharacterController = new modifyCharacterController();
                        
                        // Si la requête HTTP est de type POST
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Appelle la méthode 'updateGames' pour mettre à jour le personnage
                            $modifyCharacterController->updateGames();
                        } else {
                            // Sinon, affiche le formulaire de modification du personnage
                            $modifyCharacterController->modifyCharacter($characterId);
                        }
                    } else if ($id) {
                        // Si seul $id est défini, affiche la liste des personnages à modifier pour un jeu spécifique
                        $listCharacterController = new ListCharacterController();
                        $listCharacterController->listModifyCharacter($id);
                    } else {
                        // Sinon, affiche la liste générale des personnages à modifier
                        $modifylistCharacterController = new ListModifyCharacterController();
                        $modifylistCharacterController->listModifyCharacter();
                    }
                    // Termine l'exécution de ce cas
                    break;
                
                // Cas où $step est égal à 'deleteCharacter'
                case 'deleteCharacter':
                    // Si l'identifiant du jeu est défini
                    if ($game_id) {
                        // Instancie un objet de la classe DeleteCharacterController
                        $deleteCharacterController = new DeleteCharacterController();
                        
                        // Si la requête HTTP est de type POST
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Appelle la méthode 'deleteCharacter' pour supprimer un personnage
                            $deleteCharacterController->deleteCharacter();
                        } else {
                            // Sinon, affiche la liste des personnages à supprimer pour un jeu spécifique
                            $deleteCharacterController->listCharacterDelete($game_id);
                        }
                    } else {
                        // Si $game_id n'est pas défini, affiche la liste générale des personnages à supprimer
                        $listDeleteCharacterController = new ListDeleteCharacterController();
                        $listDeleteCharacterController->listDeleteCharacter();
                    }
                    // Termine l'exécution de ce cas
                    break;
                
                // Cas où $step est égal à 'addBoss'
                case 'addBoss':
                    // Instancie un objet de la classe AddBossController
                    $addBossController = new AddBossController();
                    
                    // Si la requête HTTP est de type POST
                    if ($_SERVER['REQUEST_METHOD'] === 'POST') { 
                        // Appelle la méthode 'addBossImage' pour ajouter une image de boss
                        $addBossController->addBossImage();
                    } else {
                        // Sinon, affiche le formulaire d'ajout de boss
                        $addBossController->addBoss();
                    }
                    // Termine l'exécution de ce cas
                    break;
                
                // Cas où $step est égal à 'modifyBoss'
                case 'modifyBoss':
                    // Si $id et $bossId sont définis
                    if ($id && $bossId) {
                        // Instancie un objet de la classe ModifyBossController
                        $modifyBossController = new ModifyBossController();
                        
                        // Si la requête HTTP est de type POST
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Appelle la méthode 'updateBossController' pour mettre à jour le boss
                            $modifyBossController->updateBossController();
                        } else {
                            // Sinon, affiche le formulaire de modification du boss
                            $modifyBossController->modifyBossController($bossId);
                        }
                    } else if ($id) {
                        // Si seul $id est défini, affiche la liste des boss à modifier pour un jeu spécifique
                        $listBossController = new ListBossController();
                        $listBossController->listModifyBoss($id);
                    } else {
                        // Sinon, affiche la liste générale des boss à modifier
                        $modifylistBossController = new ListModifyBossController();
                        $modifylistBossController->listModifyBoss();
                    }
                    // Termine l'exécution de ce cas
                    break;
                
                // Cas où $step est égal à 'deleteBoss'
                case 'deleteBoss':
                    // Si l'identifiant du jeu est défini
                    if ($game_id) {
                        // Instancie un objet de la classe DeleteBossController
                        $deleteBossController = new DeleteBossController();
                        
                        // Si la requête HTTP est de type POST
                        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                            // Appelle la méthode 'deleteBoss' pour supprimer un boss
                            $deleteBossController->deleteBoss();
                        } else {
                            // Sinon, affiche la liste des boss à supprimer pour un jeu spécifique
                            $deleteBossController->listBossDelete($game_id);
                        }
                    } else {
                        // Si $game_id n'est pas défini, affiche la liste générale des boss à supprimer
                        $listDeleteBossController = new ListDeleteBossController();
                        $listDeleteBossController->listBossCharacter();
                    }
                    // Termine l'exécution de ce cas
                    break;
            }
        } else {
            // Si l'utilisateur n'est pas admin, le redirige vers la page d'accueil
            header('Location: ./');
        }
        // Termine l'exécution de ce cas
        break;
    
    // Cas où $action est égal à 'listgames'
    case 'listgames':
        // Instancie un objet de la classe ListGamesController
        $listGamesController = new ListGamesController();
        // Appelle la méthode 'gamList' pour afficher la liste des jeux
        $listGamesController->gamList();
        // Termine l'exécution de ce cas
        break;
    
    // Cas où $action est égal à 'games'
    case 'games':
        // Instancie un objet de la classe GamesController
        $gamesController = new GamesController();
        // Si l'identifiant du jeu est défini
        if ($id) {
            // Appelle la méthode 'game' pour afficher le jeu spécifique
            $gamesController->game();
        }
        // Termine l'exécution de ce cas
        break;
    
    // Cas où $action est égal à 'story'
    case 'story':
        // Instancie un objet de la classe StoryController
        $storyController = new StoryController();
        // Si l'identifiant de l'histoire est défini
        if ($id) {
            // Appelle la méthode 'storyController' pour afficher l'histoire spécifique
            $storyController->storyController();
        }
        // Termine l'exécution de ce cas
        break;
    
    // Cas où $action est égal à 'character'
    case 'character':
        // Instancie un objet de la classe CharacterController
        $characterController = new CharacterController();
        // Appelle la méthode 'character' pour afficher les personnages
        $characterController->character();
        // Termine l'exécution de ce cas
        break;
    
    // Cas où $action est égal à 'boss'
    case 'boss':
        // Instancie un objet de la classe BossController
        $bossController = new BossController();
        // Appelle la méthode 'boss' pour afficher les boss
        $bossController->boss();
        // Termine l'exécution de ce cas
        break;
    
    // Cas où $action est égal à 'register'
    case 'register':
        // Instancie un objet de la classe RegisterController
        $registerController = new RegisterController();
        
        // Si la requête HTTP est de type POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Appelle la méthode 'userSaveController' pour enregistrer l'utilisateur
            $registerController->userSaveController();
        } else {
            // Sinon, affiche le formulaire d'inscription
            $registerController->registerController();
        }
        // Termine l'exécution de ce cas
        break;
    
    // Cas où $action est égal à 'login'
    case 'login':
        // Instancie un objet de la classe LoginController
        $loginController = new LoginController();
        
        // Si la requête HTTP est de type POST
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Appelle la méthode 'showLoginForm' pour connecter l'utilisateur
            $loginController->showLoginForm();
        } else {
            // Sinon, affiche la page de connexion
            $loginController->loginViews();
        }
        // Termine l'exécution de ce cas
        break;
    
    // Cas où $action est égal à 'logout'
    case 'logout':
        // Instancie un objet de la classe LoginController
        $loginController = new LoginController();
        // Appelle la méthode 'logout' pour déconnecter l'utilisateur
        $loginController->logout();
        // Termine l'exécution de ce cas
        break;
    
    // Cas où $action est égal à 'legalNotices'
    case 'legalNotices':
        // Instancie un objet de la classe LegalNoticesController
        $legalNoticesController = new LegalNoticesController();
        // Appelle la méthode 'notice' pour afficher les mentions légales
        $legalNoticesController->notice();
        // Termine l'exécution de ce cas
        break;
    
    // Cas où $action est égal à 'privacyPolicy'
    case 'privacyPolicy':
        // Instancie un objet de la classe PrivacyPolicyController
        $privacyPolicyController = new PrivacyPolicyController();
        // Appelle la méthode 'privacy' pour afficher la politique de confidentialité
        $privacyPolicyController->privacy();
        // Termine l'exécution de ce cas
        break;
}

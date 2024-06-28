<?php
namespace Controllers;

use Models\LoginModels;
use Views\LoginViews;

class LoginController {
        protected $loginViews;
        protected $loginModels;

        public function __construct() {
            $this->loginViews = new LoginViews();
            $this->loginModels = new LoginModels();
        }
        public function loginViews() {
            $this->loginViews->render();
        }
        public function showLoginForm() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $email = $_POST['email'];
                $password = $_POST['password'];
                $authenticated = $this->loginModels->authenticate($email, $password);

                if ($authenticated) {
                    header("Location: index.php");
                    exit();
                } else {
                    echo "Échec de la connexion. Veuillez verifier vos identifiants.";
                }
            }
        }
        public function logout() {
            session_unset();
            header("Location: index.php");
            exit();
        }
    }

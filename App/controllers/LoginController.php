<?php
namespace Controllers; // Définit l'espace de noms 'Controllers' pour organiser les classes et éviter les conflits de noms avec d'autres parties du code.

use Models\LoginModels; // Importe la classe 'LoginModels' pour gérer la logique d'authentification. 
use Views\LoginViews; // Importe la classe 'LoginViews' pour gérer l'affichage de la vue de connexion. 


class LoginController { // Déclare la classe 'LoginController' qui va contrôler la connexion et déconnexion des utilisateurs.
    protected $loginViews; // Déclare la propriété protégée '$loginViews' qui va contenir l'instance de la vue de connexion. 
    protected $loginModels; // Déclare la propriété protégée '$loginModels' qui va contenir l'instance du modèle d'authentification. 
    
    public function __construct() { // Déclare le constructeur de la classe. Ce code est exécuté lorsque la classe est instanciée. 
        $this->loginViews = new LoginViews(); // Crée une nouvelle instance de 'LoginViews' et l'affecte à la propriété '$loginViews' pour gérer l'affichage des formulaires.  
        $this->loginModels = new LoginModels(); // Crée une nouvelle instance de 'LoginModels' et l'affecte à la propriété '$loginModels' pour gérer la logique d'authentification. 
       
    }
    
    public function loginViews() { // Déclare la méthode 'loginViews' pour afficher la vue de connexion. 
        $this->loginViews->render(); // Appelle la méthode 'render' de l'objet '$loginViews' pour afficher le formulaire de connexion. 
    }

    public function showLoginForm() { // Déclare la méthode 'showLoginForm' qui gère la soumission du formulaire de connexion. 
        if ($_SERVER['REQUEST_METHOD'] === 'POST') { // Vérifie si la requête HTTP est de type POST (indiquant que le formulaire a été soumis). 
            $email = $_POST['email']; // Récupère l'email soumis dans le formulaire. 
            $password = $_POST['password']; // Récupère le mot de passe soumis dans le formulaire.
            $authenticated = $this->loginModels->authenticate($email, $password); // Appelle la méthode 'authenticate' de '$loginModels' pour vérifier si les identifiants sont valides. 
        
            if ($authenticated) { // Si l'utilisateur est authentifié (la méthode 'authenticate' retourne true). 
                header("Location: index.php"); // Redirige l'utilisateur vers la page d'accueil (index.php). 
                exit(); // Termine l'exécution du script pour éviter toute autre sortie ou traitement. 
                
            } else { // Si l'authentification échoue (l'utilisateur ou le mot de passe est incorrect).
                echo "Échec de la connexion. Veuillez verifier vos identifiants."; // Affiche un message d'erreur indiquant que la connexion a échoué. 
            }
        }
    }

    public function logout() { // Déclare la méthode 'logout' pour gérer la déconnexion de l'utilisateur. 
        session_unset(); // Supprime toutes les variables de session pour déconnecter l'utilisateur. 
        header("Location: index.php"); // Redirige l'utilisateur vers la page d'accueil après la déconnexion.
        exit(); // Termine l'exécution du script pour éviter toute autre sortie ou traitement.
    }
}

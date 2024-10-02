<?php // Ouvre le. script PHP

namespace Models; // Déclare l'espace de noms 'Models', permettant de structurer le code et éviter les conflits de nommage entre différentes classes du projet.

use App\Database; // Importe la classe 'Database' depuis l'espace de noms 'App'. Cette classe est utilisée pour établir une connexion à la base de données.
class LoginModels { // Déclare la classe 'LoginModels', qui gère les opérations liées à l'authentification des utilisateurs.
    protected $db; // Déclare une propriété protégée '$db', utilisée pour stocker l'objet de connexion à la base de données.

    public function __construct() { // Le constructeur est appelé automatiquement à la création d'une instance de la classe 'LoginModels'.
        $database = new Database(); // Instancie la classe 'Database', créant une connexion à la base de données.
        $this->db = $database->getConnection(); // Stocke la connexion à la base de données dans la propriété '$db' pour l'utiliser dans d'autres méthodes de la classe.
    }

    public function authenticate($email, $password) { // Déclare la méthode 'authenticate', qui prend en entrée l'email et le mot de passe. Elle vérifie si l'utilisateur est valide et authentifié.
        if (empty($email) || empty($password)) {
            return false;  
        }
        // Vérifie si l'email ou le mot de passe est vide. Si l'un est vide, retourne 'false', l'authentification échoue.
        try { // Bloc 'try' pour gérer les erreurs potentielles de la base de données.
            $sqlLogin = $this->db->prepare("SELECT * FROM users WHERE email = :email"); // Prépare une requête SQL pour sélectionner toutes les colonnes de la table 'users' où l'email correspond à celui fourni.
            $sqlLogin->bindParam(':email', $email); // Lie la valeur de l'email à la requête préparée pour éviter les injections SQL.
            $sqlLogin->execute(); // Exécute la requête SQL.
            $user = $sqlLogin->fetch(\PDO::FETCH_ASSOC);  // Récupère le résultat de la requête sous forme de tableau associatif. Si aucun utilisateur n'est trouvé, '$user' sera 'false'.
            if ($user && password_verify($password, $user['password'])) { // Vérifie que l'utilisateur existe et que le mot de passe fourni correspond au mot de passe haché dans la base de données.
                $_SESSION['id'] = $user['id']; // Stocke l'ID de l'utilisateur dans la session pour garder une trace de son authentification.
                $_SESSION['pseudo'] = $user['username']; // Stocke le nom d'utilisateur dans la session.
                $_SESSION['role'] = $user['role']; // Stocke le rôle de l'utilisateur (par exemple, administrateur ou utilisateur) dans la session.
                return true; // Retourne 'true' si l'authentification est réussie.
            } else {
                return false; // Retourne 'false' si l'utilisateur n'existe pas ou si le mot de passe est incorrect.
            }
        } catch (\PDOException $e) { // Bloc 'catch' pour attraper les exceptions liées aux erreurs SQL.
            return false; // Si une erreur survient, retourne 'false' pour indiquer l'échec de l'authentification.
        }
    }
}

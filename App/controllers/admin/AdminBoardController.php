<?php
// Déclare un namespace pour organiser les classes de ce fichier
namespace AdminControllers;

// Importation des classes AdminBoardViews et AdminBoardModels depuis leurs namespaces respectifs
use AdminViews\AdminBoardViews;
use AdminModels\AdminBoardModels;

// Définition de la classe AdminBoardController
class AdminBoardController {
    // Déclaration des propriétés protégées pour les vues et les modèles
    protected $adminBoardViews;
    protected $adminBoardModels;

    // Constructeur de la classe qui initialise les vues et les modèles
    public function __construct() {
        // Création d'une instance de AdminBoardViews
        $this->adminBoardViews = new AdminBoardViews();
        // Création d'une instance de AdminBoardModels
        $this->adminBoardModels = new AdminBoardModels();
    }

    // Méthode pour obtenir les utilisateurs et les afficher
    public function getUser() {
        // Récupération de la liste des utilisateurs depuis le modèle
        $users = $this->adminBoardModels->listUsers();
        // Appel de la méthode de vue pour afficher la liste des utilisateurs
        $this->adminBoardViews->usersViews($users);
    }

    // Méthode pour mettre à jour le rôle d'un utilisateur
    public function updateRole() {
        // Vérifie si la requête est de type POST (formulaire envoyé)
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            // Récupération de la liste des utilisateurs depuis le modèle
            $users = $this->adminBoardModels->listUsers();
            // Boucle à travers chaque utilisateur pour vérifier les mises à jour de rôle
            foreach ($users as $user) {
                // Échappement des caractères spéciaux pour le nom d'utilisateur
                $username = htmlspecialchars($user['username']);
                // Vérifie si un rôle a été soumis pour cet utilisateur
                if (isset($_POST['role_' . $username])) {
                    // Récupération du nouveau rôle soumis via le formulaire
                    $newRole = $_POST['role_' . $username];
                    // Mise à jour du rôle de l'utilisateur via le modèle
                    $this->adminBoardModels->updateUserRole($username, $newRole);
                }
            }
        }
    }
}

<?php
namespace Views; // Définit un espace de noms pour cette classe

class LoginViews { // Début de la déclaration de la classe LoginViews
    
    public function render() { // Début de la méthode publique render
        
        if (isset($_SESSION['id'])) { // Vérifie si la variable de session 'id' est définie (utilisateur connecté)
            echo '
            <p class="welcome-message">Bienvenue, ' . htmlspecialchars($_SESSION['pseudo']) . '!</p> <!-- Affiche un message de bienvenue avec le pseudonyme de l\'utilisateur -->
            <form class="logout-form" method="POST" action="?action=logout"> <!-- Formulaire de déconnexion avec action vers ?action=logout en méthode POST -->
                <button type="submit">Logout</button> <!-- Bouton pour déconnecter l\'utilisateur -->
            </form>';
        } else { // Si aucune session 'id' n'est définie (utilisateur non connecté)
            echo '
            <div class="form-login"> <!-- Début du formulaire de connexion -->
                <h1>Connecte-toi</h1> <!-- Titre du formulaire de connexion -->
                <form class="vertical" method="POST" action="login"> <!-- Formulaire de connexion avec méthode POST vers login -->
                    <label for="email">Email:</label> <!-- Étiquette pour le champ email -->
                    <input type="email" id="email" name="email" required> <!-- Champ de saisie pour l\'email, requis -->

                    <label for="password">Password:</label> <!-- Étiquette pour le champ password -->
                    <input type="password" id="password" name="password" required> <!-- Champ de saisie pour le mot de passe, requis -->

                    <button type="submit">Login</button> <!-- Bouton de soumission du formulaire de connexion -->
                </form> 
            </div>'; // Fin du formulaire de connexion
        }
    } // Fin de la méthode render

} // Fin de la déclaration de la classe LoginViews

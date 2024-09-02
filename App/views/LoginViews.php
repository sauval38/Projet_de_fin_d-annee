<?php

namespace Views;

// Déclaration de la classe LoginViews dans l'espace de noms Views
class LoginViews {

    // Méthode pour afficher le formulaire de connexion ou le bouton de déconnexion
    public function render() {
        // Vérifie si l'utilisateur est connecté en vérifiant la présence d'une variable de session 'id'
        if (isset($_SESSION['id'])) {
            ?>
            <!-- Si l'utilisateur est connecté, affiche un formulaire pour se déconnecter -->
            <form id="login" method="POST" action="?action=logout">
                <button type="submit">Logout</button> <!-- Bouton pour se déconnecter -->
            </form>
            <?php
        } else {
            ?>
            <!-- Si l'utilisateur n'est pas connecté, affiche le formulaire de connexion -->
            <div id="login-form">
                <h1>Connecte-toi</h1> <!-- Titre du formulaire de connexion -->
                <form class="form-login" method="POST" action="login">
                    <!-- Champ pour l'email -->
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                    <!-- Champ pour le mot de passe -->
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <!-- Bouton pour se connecter -->
                    <button type="submit">Login</button>
                </form>
            </div>
            <?php
        }
    }
}

?>

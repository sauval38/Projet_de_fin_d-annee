<?php

namespace Views;

class RegisterViews {
    public function registerFormView() {
        ?>
        <div id="register">
            <h1>Créer un compte</h1>
            <form class="register-form" action="register" method="post">

                <!-- Champ pour le nom d'utilisateur -->
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" name="username" id="username"required>

                <!-- Champ pour l'email -->
                <label for="email">Email :</label>
                <input type="email" name="email" id="email"required>

                <!-- Champ pour le mot de passe -->
                <label for="password">Mot de passe :</label>
                <input type="password" name="password" id="password" 
                       required>

                <!-- Bouton de soumission du formulaire -->
                <button type="submit">S'inscrire</button>
            </form>
        </div>
        <?php
    }
}
?>

<?php

namespace Views;

class RegisterViews {
    
    public function registerFormView() {
        ?>
        <div id="register">
            <h1>Créer un compte</h1>
            <form class="register-form" action="register" method="post">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>" required>

                <label for="email">Email d'utilisateur</label>
                <input type="email" name="email" id="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>

                <button type="submit">Envoyer</button>
            </form>
        </div>
        <?php
    }
}

?>
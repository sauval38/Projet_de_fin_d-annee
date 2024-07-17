<?php

namespace Views;

class RegisterViews {
    
    public function initForm() {
        ?>
        <div class="form-container">
            <h1>Créer un compte</h1>

            <form class="vertical" action="inscription" method="post">
                <label for="username">Nom d'utilisateur</label>
                <input type="text" name="username" id="username" value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>" required>

                <label for="email">Email d'utilisateur</label>
                <input type="email" name="email" id="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>

                <label for="password">Mot de passe</label>
                <input type="password" name="password" id="password" required>

                <button type="submit">Envoyer</button>
            </form>z
        </div>
        <?php
    }
}

?>
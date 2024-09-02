<?php

namespace Views;

class RegisterViews {
    
    /**
     * Affiche le formulaire d'inscription.
     */
    public function registerFormView() {
        ?>
        <div id="register">
            <h1>Créer un compte</h1>
            <form class="register-form" action="register" method="post">
                
                <!-- Affichage des messages d'erreur s'il y en a -->
                <?php if (isset($_SESSION['register_error'])): ?>
                    <div class="error-message">
                        <?= htmlspecialchars($_SESSION['register_error']) ?>
                    </div>
                    <?php unset($_SESSION['register_error']); // Suppression du message après affichage ?>
                <?php endif; ?>
                
                <!-- Affichage des messages de succès s'il y en a -->
                <?php if (isset($_SESSION['register_success'])): ?>
                    <div class="success-message">
                        <?= htmlspecialchars($_SESSION['register_success']) ?>
                    </div>
                    <?php unset($_SESSION['register_success']); // Suppression du message après affichage ?>
                <?php endif; ?>

                <!-- Champ pour le nom d'utilisateur -->
                <label for="username">Nom d'utilisateur :</label>
                <input type="text" name="username" id="username" 
                       value="<?= isset($_POST['username']) ? htmlspecialchars($_POST['username']) : '' ?>" 
                       required>

                <!-- Champ pour l'email -->
                <label for="email">Email :</label>
                <input type="email" name="email" id="email" 
                       value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" 
                       required>

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

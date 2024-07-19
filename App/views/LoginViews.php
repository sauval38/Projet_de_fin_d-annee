<?php

namespace Views;

class LoginViews {

    public function render() {
        if (isset($_SESSION['id'])) {
            ?>
            <form class="login" method="POST" action="?action=logout">
                <button type="submit">Logout</button>
            </form>
            <?php
        } else {
            ?>
            <div class="login-form">
                <h1>Connecte-toi</h1>
                <form class="form-login" method="POST" action="login">
                    <label for="email">Email:</label>
                    <input type="email" id="email" name="email" value="<?= isset($_POST['email']) ? htmlspecialchars($_POST['email']) : '' ?>" required>
                    <label for="password">Password:</label>
                    <input type="password" id="password" name="password" required>
                    <button type="submit">Login</button>
                </form>
            </div>
            <?php
        }
    }
}

?>
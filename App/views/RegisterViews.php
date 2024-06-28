<?php
namespace Views;

class RegisterViews {
    public function initForm () {
        echo '
            <div class="form-container">
                <h1> Créer un compte</h1>
                <form class="vertical" action="inscription" method="post" >
                    <label for="username">Nom d\'utilisateur</label>
                    <input type="text" name="username" id="username">
                    
                    <label for="email">Email d\'utilisateur</label>
                    <input type="text" name="email" id="email">
                    
                    <label for="password">Mot de passe</label><input type="text" name="password" id="password">
                    <button>Envoyer</button>
                </form>
            </div>
        ';
    }
}
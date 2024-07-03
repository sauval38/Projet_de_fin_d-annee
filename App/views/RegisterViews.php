<?php
namespace Views; // Définit un espace de noms pour cette classe

class RegisterViews { // Début de la déclaration de la classe RegisterViews

    public function initForm () { // Début de la méthode publique initForm

        // Démarre l'affichage du formulaire HTML
        echo '
            <div class="form-container"> <!-- Début du conteneur de formulaire -->
                <h1> Créer un compte</h1> <!-- Titre principal du formulaire -->
                <form class="vertical" action="inscription" method="post" > <!-- Début du formulaire avec classe CSS "vertical", action "inscription" en méthode "post" -->
                    <label for="username">Nom d\'utilisateur</label> <!-- Étiquette pour le champ "username" -->
                    <input type="text" name="username" id="username"> <!-- Champ de saisie pour le nom d\'utilisateur avec id "username" -->
                    
                    <label for="email">Email d\'utilisateur</label> <!-- Étiquette pour le champ "email" -->
                    <input type="text" name="email" id="email"> <!-- Champ de saisie pour l\'email avec id "email" -->
                    
                    <label for="password">Mot de passe</label><input type="text" name="password" id="password"> <!-- Étiquette pour le champ "password" suivi du champ de saisie pour le mot de passe avec id "password" -->
                    <button>Envoyer</button> <!-- Bouton de soumission du formulaire -->
                </form> <!-- Fin du formulaire -->
            </div> <!-- Fin du conteneur de formulaire -->
        ';

    } // Fin de la méthode initForm

} // Fin de la déclaration de la classe RegisterViews

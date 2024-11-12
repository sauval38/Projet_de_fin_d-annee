<?php

namespace Views;  // La classe ContactViews appartient à l'espace de noms Views

class ContactViews {  // Déclaration de la classe ContactViews

    // Méthode pour afficher le formulaire de contact
    public function contact() {  
        ?>
        <!-- Titre principal du formulaire de contact -->
        <h1 id="ajouter">Tu as des questions ? Contacte-moi</h1>
        
        <!-- Conteneur principal du formulaire -->
        <div id="form-contact">
        
            <!-- Début du formulaire avec méthode POST pour envoyer les données -->
            <form class="form" method="POST" action="contact">
            
                <!-- Titre secondaire du formulaire -->
                <h2>Pose-moi tes questions ici</h2>

                <!-- Champ de texte pour le nom de l'utilisateur -->
                <label for="text">Nom:</label>
                <input type="text" id="name" name="name" required>  <!-- Champ obligatoire pour le nom -->

                <!-- Champ de texte pour l'email de l'utilisateur -->
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>  <!-- Champ obligatoire pour l'email -->

                <!-- Champ de texte pour l'objet du message -->
                <label for="subject">Objet:</label>
                <input type="text" id="subject" name="subject" required>  <!-- Champ obligatoire pour l'objet -->
                
                <!-- Champ de texte pour le message -->
                <label for="message">Message:</label>
                <textarea id="message" name="message" required></textarea>  <!-- Champ obligatoire pour le message -->

                <!-- Bouton pour soumettre le formulaire -->
                <button type="submit">Envoyer</button>
            </form>
        </div> 
        <?php 
    }
}

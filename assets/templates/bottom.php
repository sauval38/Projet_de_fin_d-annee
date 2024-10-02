<?php
// Vérifiez si l'URL contient 'admin'
if (strpos($_SERVER['REQUEST_URI'], 'admin') === false): ?>
<footer> 
    <!-- Début de la balise <footer>, qui représente le pied de page du document. -->
    <nav id="footer-container"> 
        <!-- Balise <nav> avec l'ID "footer-container". Elle contient la navigation du pied de page. -->
        <div class="footer-section"> 
            <!-- Div avec la classe "footer-section", utilisée pour regrouper les éléments du pied de page. -->
            <a class="footer-para">&copy; 2024 GamingSite. Tous droits réservés.</a> 
            <!-- Lien avec la classe "footer-para", qui affiche le copyright de l'année 2024 pour GamingSite. -->
            <a href="legalNotices">Mentions légales</a> | 
            <!-- Lien hypertexte vers la page des mentions légales avec le texte "Mentions légales". -->
            <a href="privacyPolicy">Politique de confidentialité</a> 
            <!-- Lien hypertexte vers la page de la politique de confidentialité avec le texte "Politique de confidentialité". -->
        </div> 
        <!-- Fermeture de la div "footer-section". -->
        <div class="social-icons"> 
            <!-- Div avec la classe "social-icons", utilisée pour regrouper les icônes de réseaux sociaux. -->
            <a href="https://www.facebook.com/groups/206718632861663" target="_blank"> 
                <!-- Lien hypertexte vers un groupe Facebook, avec un attribut target="_blank" pour ouvrir le lien dans un nouvel onglet. -->
                <img src="https://upload.wikimedia.org/wikipedia/commons/5/51/Facebook_f_logo_%282019%29.svg" alt="Facebook"> 
                <!-- Image du logo Facebook, avec un attribut alt décrivant l'image. -->
                <span>Facebook</span> 
                <!-- Texte "Facebook" affiché à côté du logo. -->
            </a> 
            <!-- Fermeture du lien hypertexte pour Facebook. -->
            <a href="https://www.youtube.com/watch?v=nC0PrkJQ3dY" target="_blank"> 
                <!-- Lien hypertexte vers une vidéo YouTube, avec un attribut target="_blank" pour ouvrir le lien dans un nouvel onglet. -->
                <img src="https://upload.wikimedia.org/wikipedia/commons/4/42/YouTube_icon_%282013-2017%29.png" alt="YouTube"> 
                <!-- Image du logo YouTube, avec un attribut alt décrivant l'image. -->
                <span>YouTube</span> 
                <!-- Texte "YouTube" affiché à côté du logo. -->
            </a> 
            <!-- Fermeture du lien hypertexte pour YouTube. -->
            <a href="https://www.instagram.com/ffxiv/" target="_blank"> 
                <!-- Lien hypertexte vers un compte Instagram, avec un attribut target="_blank" pour ouvrir le lien dans un nouvel onglet. -->
                <img src="https://upload.wikimedia.org/wikipedia/commons/a/a5/Instagram_icon.png" alt="Instagram"> 
                <!-- Image du logo Instagram, avec un attribut alt décrivant l'image. -->
                <span>Instagram</span> 
                <!-- Texte "Instagram" affiché à côté du logo. -->
            </a> 
            <!-- Fermeture du lien hypertexte pour Instagram. -->
        </div> 
        <!-- Fermeture de la div "social-icons". -->
    </nav> 
    <!-- Fermeture de la balise <nav> "footer-container". -->
</footer> 
<!-- Fermeture de la balise <footer>. -->
<?php endif; ?>  
<!-- Fermeture de la balise php -->  
</body> 
<!-- Fermeture de la balise <body>, qui contient le contenu principal de la page. -->
</html> 
<!-- Fermeture de la balise <html>, qui indique la fin du document HTML. -->

<?php
echo'
<nav id="menu">
   
        <a href="">Accueil</a></li>
        <a href="games">Jeux</a></li>
        <a href="personnage">Personnage</a></li>';
        if(isset($_SESSION['id'])){
                echo '<a href="admin">Admin</a></li>
                        <a href="logout">Se deconnecter</a></li>';

        } else {
                echo '<a href="inscription">Inscription</a></li>
                <a href="login">Connexion</a></li>';     
        }
        echo '</nav>';


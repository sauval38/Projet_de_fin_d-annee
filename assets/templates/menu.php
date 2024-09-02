<nav id="menu">
    <!-- Début du bloc de navigation avec l'ID 'menu', ce qui peut être utilisé pour le style ou les scripts -->
    
    <!-- Case à cocher pour activer/désactiver le menu, utilisé pour le menu responsive -->
    <input type="checkbox" id="menu-toggle">
    
    <!-- Label associé à la case à cocher pour servir de bouton pour activer/désactiver le menu -->
    <label for="menu-toggle" class="menu-icon">
        <!-- Trois éléments <span> pour créer une icône de menu hamburger -->
        <span></span>
        <span></span>
        <span></span>
    </label>
    
    <!-- Contenu du menu qui sera affiché lorsque la case à cocher est activée -->
    <div class="menu-items">
        <!-- Lien vers la page d'accueil -->
        <a href="">Accueil</a>
        
        <!-- Lien vers la page des jeux -->
        <a href="listgames">Jeux</a>
        
        <!-- Vérifie si une session est active -->
        <?php if (isset($_SESSION['id'])): ?>
            <!-- Vérifie si le rôle de l'utilisateur est 'admin' -->
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <!-- Lien vers la page d'administration visible uniquement pour les administrateurs -->
                <a href="admin">Admin</a>
            <?php endif; ?>
            
            <!-- Lien pour se déconnecter, visible lorsque l'utilisateur est connecté -->
            <a href="logout">Se déconnecter</a>
        <?php else: ?>
            <!-- Lien vers la page d'inscription, visible lorsque l'utilisateur n'est pas connecté -->
            <a href="register">Inscription</a>
            
            <!-- Lien vers la page de connexion, visible lorsque l'utilisateur n'est pas connecté -->
            <a href="login">Connexion</a>
        <?php endif; ?>
    </div>
</nav>

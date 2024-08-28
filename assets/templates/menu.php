<nav id="menu">
    <input type="checkbox" id="menu-toggle">
    <label for="menu-toggle" class="menu-icon">
        <span></span>
        <span></span>
        <span></span>
    </label>
    <div class="menu-items">
        <a href="">Accueil</a>
        <a href="listgames">Jeux</a>
        <?php if (isset($_SESSION['id'])): ?>
            <?php if ($_SESSION['role'] === 'admin'): ?>
                <a href="admin">Admin</a>
            <?php endif; ?>
            <a href="logout">Se déconnecter</a>
        <?php else: ?>
            <a href="register">Inscription</a>
            <a href="login">Connexion</a>
        <?php endif; ?>
    </div>
</nav>

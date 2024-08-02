<nav id="menu">
    <a href="">Accueil</a>
    <a href="listgames">Jeux</a>
    <?php if (isset($_SESSION['id'])): ?>
        <a href="admin">Admin</a>
        <a href="logout">Se déconnecter</a>
    <?php else: ?>
        <a href="register">Inscription</a>
        <a href="login">Connexion</a>
    <?php endif; ?>
</nav>
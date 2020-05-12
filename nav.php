<header id="header">
    <div>
        <a href="index.php" title="Lien vers l'accueil" id="home">Minerynthe</a>
        <nav>
            <ul>
                <li><a href="support.php" id="support">Support</a></li>
                <?php
if (isset($_SESSION['id']) and isset($_SESSION['username'])) {
    ?>
                    <li><a href="profiles.php" id="profil">Profil</a></li>
                    <li><a href="logout.php" id="logout">Déconnexion</a></li>
                <?php
} else {
    ?>
                    <li><a href="login.php" id="login">Connexion</a></li>
                    <li><a href="register.php" id="register">Inscription</a></li>
                <?php
}
?>
            </ul>
        </nav>
    </div>
</header>
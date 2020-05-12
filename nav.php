<header id="header">
    <div>
        <a href="index.php" title="Lien vers l'accueil" id="home">Site Emploi</a>
        <nav>
            <ul>
                <?php
try {
    if (isset($_SESSION['id']) and isset($_SESSION['prenom'])) {
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
} catch (PDOException $event) {
    die('Erreur : ' . $event->getMessage());
}
?>
            </ul>
        </nav>
    </div>
</header>
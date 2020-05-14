<?php
try {
    if (!isset($_SESSION)) {
        session_start();
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>

<header id="header">
    <div>
        <a href="index.php" title="Lien vers l'accueil" id="home">Site Emploi</a>
        <nav>
            <ul>
                <?php
try {
    if (isset($_SESSION['ROLE'])) {
        ?>
                    <li><a href="./profiles.php" title="Lien vers votre profil" id="profil">Profil</a></li>
                    <li><a href="./logout.php" title="Lien de déconnexion" id="logout">Déconnexion</a></li>
                <?php
} else {
        ?>
                    <li><a href="./login.php" title="Lien de connexion" id="login">Connexion</a></li>
                    <li><a href="./register.php" title="Lien vers la page d'inscription" id="register">Inscription</a></li>
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
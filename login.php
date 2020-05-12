<?php
include './db.php';
if (isset($_POST['login'])) {
    $username = htmlspecialchars($_POST['username']);
    $req = $pdo->prepare("SELECT id, password FROM users WHERE username = ?");
    $req->execute(array($username));
    $resultat = $req->fetch();

    $isPasswordCorrect = password_verify($_POST['password'], $resultat['password']);

    if (!$resultat) {
        echo 'Mauvais identifiant ou mot de passe !';
    } else {
        if ($isPasswordCorrect) {
            session_start();
            $_SESSION['id'] = $resultat['id'];
            $_SESSION['username'] = $username;
            header("Location: profiles.php");
        } else {
            echo 'Mauvais identifiant ou mot de passe !';
        }
    }
}
?>

<!DOCTYPE html>
<html>
    <?php include './head.php';?>
    <body>
        <?php include './nav.php';?>
        <div id="connexion">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h2 class="card-title">Connexion</h2>
                    <p class="card-text">
                    <form method="post">
                        <div>
                            <label>Username : </label>
                            <input type="text" name="username" placeholder="Username" required>
                        </div>
                        <div>
                            <label>Mot de passe : </label>
                            <input type="password" name="password" placeholder="Mot de passe" required>
                        </div>
                        <div>
                            <input id="boutonco" type="submit" name="login" value="Se connecter">
                        </div>
                    </form>
                    <h3><a href="register.php">Pas de compte ? <br> Inscrivez-vous.</a></h3>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
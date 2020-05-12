<?php
try {
    include './db.php';
    $requete1 = "SELECT id, password FROM users WHERE email =  ?";
    $query1 = $pdo->prepare($requete1);
    $query1->execute(array($email));
    $resultat = $requete1->fetch();

    if (!empty($_POST['email'] && $_POST['email'] == $resultat)) {
        $_SESSION['IS_CONNECTED'] = true;
        header("Location: http://localhost:8080/tp_php/profiles.php");
        exit;
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
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
                            <label>Email : </label>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <br>
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
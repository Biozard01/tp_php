<?php
try {
    include './db.php';
    if (isset($_POST['register'])) {
        $nom = htmlspecialchars($_POST['nom']);
        $prenom = htmlspecialchars($_POST['prenom']);
        $email = htmlspecialchars($_POST['email']);
        $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
        $req = $pdo->prepare("INSERT INTO users(nom, prenom, email, password, role, register_date) VALUES(?, ?, ?, ?, CURDATE())");
        $req->execute(array($nom, $prenom, $email, $pass_hache, "user"));
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
        <div id="insc">
            <div class="card" style="width: 100%;">
                <div class="card-body">
                    <h2 class="card-title">S'Inscrire</h2>
                    <p class="card-text">
                    <form method="post">
                        <div>
                            <label>Nom : </label>
                            <input type="text" name="nom" placeholder="nom" required>
                        </div>
                        <div>
                            <label>Prénom : </label>
                            <input type="text" name="prenom" placeholder="prenom" required>
                        </div>
                        <div>
                            <label>Email : </label>
                            <input type="email" name="email" placeholder="Email" required>
                        </div>
                        <div>
                            <label>Mot de passe : </label>
                            <input type="password" name="password" placeholder="Mot de passe" required>
                        </div>
                        <div>
                            <input id="boutoninsc" type="submit" name="register" value="S'enregistrer">
                        </div>
                    </form>
                    <h3><a href="login.php">Vous avez déjà un compte ? <br> Connectez-vous.</a></h3>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>
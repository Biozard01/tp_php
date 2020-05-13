<?php
try {
    include './db.php';
    if (isset($_POST['register'])) {
        session_start();
        $nom = htmlspecialchars(strtolower($_POST['nom']));
        $prenom = htmlspecialchars(strtolower($_POST['prenom']));
        $GetEmail = htmlspecialchars(strtolower($_POST['email']));
        $pass_hache = htmlspecialchars(password_hash($_POST['password'], PASSWORD_DEFAULT));

        if (isset($_POST['entreprise'])) {
            $isEntreprise = 1;
        } else {
            $isEntreprise = 0;
        }
        $_SESSION['role'] = $isEntreprise;
        $requete1 = "INSERT INTO users(nom, prenom, email, passsword, rrole) VALUES(?, ?, ?, ?, ?)";
        $query1 = $pdo->prepare($requete1);
        $query1->execute(array($nom, $prenom, $GetEmail, $pass_hache, $isEntreprise));
        header("Location: http://localhost:8080/tp_php/login.php");
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
                            <input type="text" name="nom" placeholder="Nom" required>
                        </div>
                        <div>
                            <label>Prénom : </label>
                            <input type="text" name="prenom" placeholder="Prenom" required>
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
                            <input type="checkbox" name="entreprise">
                            <label for="entreprise">Vous êtes une entreprise</label>
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
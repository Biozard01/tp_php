<?php
try {
    if (!isset($_SESSION)) {
        session_start();
    }
    include './db.php';
    if (isset($_SESSION['ROLE'])) {
        $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $req->execute(array($_SESSION['ID']));
        $user = $req->fetch();
        if (isset($_SESSION['cancel_email'])) {
            header("Location: http://localhost:8080/tp_php/profiles.php");
            if (isset($_SESSION['save_email'])) {
                $newemail = htmlspecialchars(strtolower($_SESSION['save_email']));

                $TestEmail = $pdo->prepare("SELECT email FROM users");
                $TestEmail->execute();
                $result = $TestEmail->fetchAll();

                foreach ($result as $cle => $valeur) {
                    $emailcut = json_encode(array_slice($result, $cle, $valeur));
                    $cle++;
                    $str = $emailcut;
                    $order = array("[", "{", "email", ":", "}", "]", '"', ',', '    ');
                    $replace = '';

                    $emailclean = str_replace($order, $replace, $str);

                    if ($newemail === $GetEmail) {
                        header("Location: http://localhost:8080/tp_php/profiles.php");
                        exit;
                    }

                    $req = $pdo->prepare('UPDATE users SET email = ? WHERE id = ?');
                    $req->execute(array($newemail, $user['ID']));
                }}}
    } else {
        header("Location: http://localhost:8080/tp_php/login.php");
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
    <div id="profiles">
            <div style="width: 100%;">
                <div>
                    <h2>Votre Profil</h2>
                    <?php
try {
    if (isset($_POST['modify_email'])) {?>
                                    <form method="post">
                                        <div>
                                            <label>Entrer votre nouvelle adresse email : </label>
                                            <input type="text" name="newemail" placeholder="Nouvelle email">
                                            <br>
                                            <br>
                                            <input type="submit" name="save_email" value="Enregistrer">
                                            <br>
                                            <br>
                                            <input type="submit" name="cancel_email" value="Annuler">
                                        </div>
                                    </form>
                                <?php
} else {?>
                                    <form method="post">
                                        <p>Adresse email actuel :  <?php echo $_SESSION['EMAIL'] ?></p>
                                        <br>
                                        <button type="submit" id="buttonmodemail" name="modify_email">Modifier mon email</button>
                                    </form>
                                <?php
}
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}?>
                    </p>
                </div>
            </div>
        </div>
    </body>
</html>

<?php
include './db.php';
session_start();

if (isset($_SESSION['ROLE'])) {
    if (isset($_POST['cancel_email'])) {
        $_SESSION['ERROR'] = true;
        echo 'cancel';
        //header("Location: http://localhost:8080/tp_php/profiles.php");
        //exit;
    }

} else {
    //header("Location: http://localhost:8080/tp_php/login.php");
    //exit;
}
?>

<!DOCTYPE html>
<html>

    <body>
    <div id="profiles">
            <div style="width: 100%;">
                <div>
<form method="post">
    <div>
        <label>Entrer votre nouvelle adresse email : </label>
        <input type="text" name="newemail" placeholder="Nouvelle email">
        <br>
        <br>
        <?php

if (isset($_POST['save_email'])) {
    $newemail = htmlspecialchars(strtolower($_POST['newemail']));

    $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute(array($_SESSION['ID']));
    $user = $req->fetch();

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
        echo 'yop';
        echo '<br>';
        echo $emailclean;
        echo '<br>';
        echo 'test';
        if ($newemail === $emailclean or $newemail === '') {
            echo '<br>';
            echo 'nope';
            echo '<br>';
            $_SESSION['ERROR'] = true;
            //header("Location: http://localhost:8080/tp_php/profiles.php");
            //exit;
        } else {
            $req1 = $pdo->prepare('UPDATE users SET email = ? WHERE id = ?');
            $req1->execute(array($newemail, $user['id']));
        }

    }
} else {
    echo 'not set';
}

?>
        <br>
        <input type="submit" name="save_email" value="Enregistrer">
        <br>
        <br>
        <input type="submit" name="cancel_email" value="Annuler">
    </div>
</form>
</html>

<?php
include './db.php';

//$getemaillogin = "arthur.laforest33@gmail.com";
$getemaillogin = "admin@admin.com";
$password = "root";

$req = $pdo->prepare("SELECT id, passsword FROM users WHERE email = ?");
$req->execute(array($getemaillogin));
$resultat = $req->fetch();

$isPasswordCorrect = password_verify($password, $resultat['passsword']);

echo $isPasswordCorrect;

echo '<br>';

if (!$resultat) {
    echo 'Mauvais identifiant ou mot de passe !';
} else {
    if ($isPasswordCorrect) {
        echo 'ok';
    } else {
        echo 'Mauvais identifiant ou mot de passe !';
    }
}

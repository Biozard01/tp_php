<?php
include './db.php';
session_start();
$_SESSION['ROLE'] = 2;
$_SESSION['save_email'] = 'admin@swag.com';
$_SESSION['id'] = '1';

if (isset($_SESSION['ROLE'])) {
    $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute(array($_SESSION['id']));
    $user = $req->fetch();

    if (isset($_SESSION['save_email'])) {
        $newemail = htmlspecialchars(strtolower($_SESSION['save_email']));

        $req = $pdo->prepare('UPDATE users SET email = ? WHERE id = ?');
        $req->execute(array($newemail, $user['id']));
    }
}

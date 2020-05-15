<?php

$database_host = 'localhost';
$database_port = '3306';
$database_dbname = 'siteemploi';
$database_user = 'root';
$database_password = '';
$database_charset = 'UTF8';
$database_options = [
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
];

$pdo = new PDO(
    'mysql:host=' . $database_host .
    ';port=' . $database_port .
    ';dbname=' . $database_dbname .
    ';charset=' . $database_charset,
    $database_user,
    $database_password,
    $database_options
);

try {
    $requete1 = "CREATE TABLE IF NOT EXISTS siteemploi.users (
        id INT NOT NULL AUTO_INCREMENT,
        nom VARCHAR(255) NOT NULL,
        prenom VARCHAR(255) NOT NULL,
        email VARCHAR(255) NOT NULL,
        passsword VARCHAR(255) NOT NULL,
        rrole tinyint(2) NULL,
        PRIMARY KEY (id));";

    $query1 = $pdo->prepare($requete1);
    $query1->execute();

    $CreateAdmin = $pdo->prepare("SELECT email FROM users");
    $CreateAdmin->execute();
    $result = $CreateAdmin->fetchAll();

    if ($result <= array(1)) {
        $nom = strtolower("DOE");
        $prenom = strtolower("John");
        $email = "admin@admin.com";
        $passsword = password_hash("root", PASSWORD_DEFAULT);
        $rrole = 2;
        $requete2 = "INSERT INTO siteemploi.users (nom, prenom, email, passsword, rrole) VALUES (:nom, :prenom, :email, :passsword, :rrole)";

        $query2 = $pdo->prepare($requete2);
        $query2->bindParam('nom', $nom);
        $query2->bindParam('prenom', $prenom);
        $query2->bindParam('email', $email);
        $query2->bindParam('passsword', $passsword);
        $query2->bindParam('rrole', $rrole);
        $query2->execute();

    }
} catch (PDOException $event) {
    die('Erreur : ' . $event->getMessage());
}

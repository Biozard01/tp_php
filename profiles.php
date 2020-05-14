<?php
try {
    if (!isset($_SESSION)) {
        session_start();
    }
    include './db.php';
    if (isset($_SESSION['ROLE'])) {
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
    <?php echo '<p>' . $_SESSION['NOM'] . ' ' . $_SESSION['PRENOM'] . '<br>' . $_SESSION['EMAIL'] . '</p>'; ?>
    </body>
</html>

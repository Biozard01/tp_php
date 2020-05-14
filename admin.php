<?php
try {
    if (!isset($_SESSION)) {
        session_start();
    }
    include './db.php';
    if (isset($_SESSION['ROLE']) && $_SESSION['ROLE'] == 2) {
    } else {
        header("Location: http://localhost:8080/tp_php/index.php");
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

    </body>
</html>

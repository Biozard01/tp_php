<?php
try {
    include './db.php';
    session_start();
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

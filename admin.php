<?php
try {
    include './db.php';
    session_start();
    ?>

    <!DOCTYPE html>
    <html>
        <?php include './head.php';?>
        <body>
            <?php include './nav.php';?>
             <p>Vous avez tous les pouvoirs</p>

        </body>
    </html>
    <?php
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>
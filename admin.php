<?php
try {
    include './db.php';
    session_start();
    if (isset($_GET['id'])) {
        $isUserAdmin = intval($_GET['isadmin']);
        $req = $pdo->prepare('SELECT * FROM users WHERE isadmin = ?');
        $req->execute(array($isUserAdmin));
        $user = $req->fetch();
        if (isset($_SESSION['isadmin']) == "1") {
            ?>

        <!DOCTYPE html>
        <html>
            <?php include './head.php';?>
            <body>
                <?php include './nav.php';?>
                <p>Vous avez tous les pouvoirs</p>

            </body>
        </html>
    <?php }
    }
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}

?>
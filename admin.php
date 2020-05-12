<?php
try {
    include './db.php';
    session_start();
    if (isset($_GET['id'])) {
        $userid = intval($_GET['id']);
        $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $req->execute(array($userid));
        $user = $req->fetch();
        $role = $user['role'];
        if (isset($_SESSION['id']) and $user['id'] == $_SESSION['id'] and $role == "admin") {
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
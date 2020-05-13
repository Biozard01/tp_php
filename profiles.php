<?php
include './db.php';
session_start();
if (isset($_SESSION['id'])) {
    $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
    $req->execute(array($_SESSION['id']));
    $user = $req->fetch();
    if (isset($_SESSION['id']) and $user['id'] == $_SESSION['id']) {
        if (isset($_POST['save_username'])) {
            $username = htmlspecialchars($_POST['username']);
            $req = $pdo->prepare('UPDATE users SET username = ? WHERE id = ?');
            $req->execute(array($username, $user['id']));
        }
        if (isset($_POST['save_password'])) {
            $pass_hache = password_hash($_POST['password'], PASSWORD_DEFAULT);
            $req = $pdo->prepare('UPDATE users SET password = ? WHERE id = ?');
            $req->execute(array($pass_hache, $user['id']));
        }
        $req = $pdo->prepare('SELECT * FROM users WHERE id = ?');
        $req->execute(array($user['id']));
        $info = $req->fetch();
        ?>

        <!DOCTYPE html>
            <html>
            <?php include './head.php';?>
                <body>
                    <?php include './nav.php';?>

                    <div id="conteneur">
                        <div class="card" style="width: 100%;">
                            <div class="card-body">
                                <h2 class="card-title">Renseignements Personnels</h2>
                                <?php if ($user['rrole'] == "admin") {?>
                                    <p>Bonjour <?=$user['username']?> !</p>
                                <?php }?>

                                <?php if ($user['rrole'] == "user") {?>
                                    <p>hello user</p>
                                <?php }?>
                                <?php
if (isset($_POST['modify_username'])) {?>
                                    <form method="post">
                                        <div>
                                            <label>Nom du profil : </label>
                                            <input type="text" name="username" placeholder="Nom du profil" value="<?=$user['username'];?>" required>
                                            <input type="submit" name="save_username" value="Enregistrer">

                                        </div>
                                    </form>
                                    <form method="post">
                                        <input type="submit" name="cancel_username" value="Annuler">
                                    </form>
                                <?php
} else {?>
                                    <form method="post">
                                        <p>Nom du profil actuel : <?=$info['username']?> <button type="submit" class="btn btn-primary" name="modify_username">Modifier mon pseudo</button></p>
                                    </form>
                                <?php
}
        if (isset($_POST['modify_password'])) {
            ?>
                                    <form method="post">
                                        <div>
                                            <label>Mot de passe : </label>
                                            <input type="password" name="password" placeholder="Password" required>
                                            <input type="submit" name="save_password" value="Enregistrer">
                                        </div>
                                    </form>
                                    <form method="post">
                                        <input type="submit" name="cancel_password" value="Annuler">
                                    </form>
                                    <?php
} else {
            ?>
                                <form method="post">
                                    <p>Mot de passe : <button type="submit" class="btn btn-primary" name="modify_password">Reset votre mot de passe.</button></p>
                                </form>
                                <?php }?>
                            </div>
                        </div>

                    </div>
                </body>
            </html>
        <?php
}
}
?>
<?php
try {
    if (!isset($_SESSION)) {
        session_start();
    }
    include './db.php';
} catch (Exception $e) {
    die('Erreur : ' . $e->getMessage());
}
?>
<!DOCTYPE html>
<html>
    <?php include './head.php';?>
    <body>
        <?php include './nav.php';
try {

    if (isset($_SESSION['ROLE'])) {

        if ($_SESSION['ROLE'] == 1) {
            ?>

        <div id="offresdispo">
            <div style="width: 100%;">
                <div>
                    <h2>Vos offres disponible</h2>
                    <div id="offres">
<?php

            $offreemploi = $pdo->prepare("SELECT emploi FROM offres WHERE entreprise LIKE ?");
            $offreemploi->execute(array($_SESSION['EMAIL']));
            $result = $offreemploi->fetchAll();

            $offresalaire = $pdo->prepare("SELECT salaire FROM offres WHERE entreprise LIKE ?");
            $offresalaire->execute(array($_SESSION['EMAIL']));
            $result1 = $offresalaire->fetchAll();

            foreach ($result as $cle => $valeur) {
                $emploicut = json_encode(array_slice($result, $cle, $valeur));

                $str = $emploicut;
                $order = array("[", "{", "emploi", ":", "}", "]", '"', ',');
                $replace = '';
                $salairecut = json_encode(array_slice($result1, $cle, $valeur));
                $str1 = $salairecut;
                $order1 = array("[", "{", "salaire", ":", "}", "]", '"', ',');
                $replace1 = '';

                $cle++;
                $emploiclean = str_replace($order, $replace, $str);
                $salaireclean = str_replace($order1, $replace1, $str1);

                echo '<hr>';
                echo '<p>' . 'Nom de l emploi : ' . $emploiclean . '</p>';
                echo '<p>' . 'Salaire : ' . $salaireclean . '</p>';
                echo '<hr>';
            }
            ?>
                    </div>
                </div>
            </div>
        </div>

    <?php
}

        if ($_SESSION['ROLE'] == 0) {
            ?>
        <div id="offresdispo">
            <div style="width: 100%;">
                <div>
                    <h2>Offres disponible</h2>
                </div>
            </div>
        </div>
        <?php
}
    }

} catch (PDOException $event) {
    die('Erreur : ' . $event->getMessage());
}

?>
    </body>
</html>

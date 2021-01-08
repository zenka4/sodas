<?php
include __DIR__ . '/vendor/autoload.php';

use Jeff\App;
// include __DIR__ . '/App.php';
// include __DIR__ . '/Agurkas.php';
// include __DIR__ . '/Zirnis.php';
session_start();
if (isset($_GET['logout'])) {
    $_SESSION['logget'] = 0;
    App::redirectLogin();
}
// ar prisijunges
if (!isset($_SESSION['logget']) || $_SESSION['logget'] != 1) {
    App::redirectLogin();
}

if (!isset($_SESSION['a'])) {
    App::createSesionA();
}

// AUGINIMO SCENARIJUS
if (isset($_POST['auginti'])) {
    _d($_POST);
    App::raise();
    // foreach ($_SESSION['a'] as $index => &$augalas) {
    //     $augalas->auginti();
    // }
    header('Location: http://localhost/phpNd/plants/growGrass.php');
    exit;
}
// if (isset($_POST['auginti'])) {
//     foreach ($_SESSION['a'] as $index => &$antiCovid) {
//         $antiCovid->{'kankoreziai'} += $_POST['kiekis'][$antiCovid->{'id'}];
//     }
// _d($_POST['kiekis']);
//     header('Location: http://localhost/phpNd/plants/growGrass.php');
//     exit;
// }

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>grow</title>
    <link rel="stylesheet" href="antiW.css">
</head>

<body>
    <h1>Mari Ivana sodas</h1>
    <div class="container">
        <div class="row">
            <h2>Auginimas</h2>
            <nav class="menu">
                <a href="http://localhost/phpNd/plants/plantGrass.php">Sodinti</a>
                <a href="http://localhost/phpNd/plants/harvestGrass.php">Derlius</a>
                <a href="http://localhost/phpNd/plants/loginPlant.php?logout">Exit</a>
            </nav>
        </div>
    </div>
    <form class="container" action="" method="post">
        <?php foreach ($_SESSION['a'] as $augalas) : ?>
            <?php $augalas = unserialize($augalas) ?>
            <div class="row">
                <?php $augalas->kiek() ?>
                <img src="./img/<?= $augalas->photo ?>.jpg" alt="">
                <p class="gr">ANTI-COV-WEED Nr. <?= $augalas->id ?><span>kankorėžių : <?= $augalas->kazkasIsaugo ?></span><span>+ <?= $augalas->kiek ?></span></p>
                <input type="hidden" name="kiekis[<?= $augalas->id ?>]" value="<?= $augalas->kiek ?>">


            </div>
        <?php endforeach ?>
        <button class="row" type="submit" name="auginti">Auginti</button>
    </form>

</body>

</html>
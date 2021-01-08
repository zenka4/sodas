<?php
include __DIR__ . '/vendor/autoload.php';

use Jeff\App;

session_start();

if (isset($_GET['logout'])) {
    $_SESSION['logget'] = 0;
    App::redirectLogin();
}

if (!isset($_SESSION['logget']) || $_SESSION['logget'] != 1) {
    App::redirectLogin();
}

if (!isset($_SESSION['a'])) {
    App::createSesionA();
}

// SODINIMO SCENARIJUS
//egles
if (isset($_POST['sodintiEgle'])) {
    App::addPlant(1);
    App::redirectPlant();
}
if (isset($_POST['sodintiZirnis'])) {
    App::addPlant(2);
    App::redirectPlant();
}
// ISROVIMO SCENARIJUS
if (isset($_POST['rauti'])) {
    App::deletePlant();
    App::redirectPlant();
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>plant</title>
    <link rel="stylesheet" href="antiW.css">
</head>

<body>
    <h1>Mari Ivana sodas</h1>
    <div class="container">
        <div class="row">
            <h2>Sodinimas</h2>
            <nav class="menu">
                <a href="http://localhost/phpNd/plants/growGrass.php">Auginti</a>
                <a href="http://localhost/phpNd/plants/harvestGrass.php">Derlius</a>
                <a href="?logout">Exit</a>
            </nav>
        </div>
    </div>
    <form class="container" action="" method="post">
        <?php foreach ($_SESSION['a'] as $augalas) : ?>
            <?php $augalas = unserialize($augalas) ?>
            <div class="row">
                <img src="./img/<?= $augalas->photo ?>.jpg" alt="">
                <p class="plnt">AUGALO nr. <?= $augalas->id ?><span>isaugusiu: <?= $augalas->kazkasIsaugo ?></span></p>
                <button class="X" type="submit" name="rauti" value="<?= $augalas->id ?>">X</button>
            </div>

        <?php endforeach ?>
        <button class="row" type="submit" name="sodintiEgle">SODINTI EGLE</button>
        <button class="row" type="submit" name="sodintiZirnis">SODINTI ZIRNI</button>
    </form>

</body>

</html>
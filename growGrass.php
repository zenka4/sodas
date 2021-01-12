<?php
defined('DOOR_BELL') || die('nelipk pro langa');
// include __DIR__ . '/vendor/autoload.php';

use Jeff\App;

$store = new Jeff\Store('augalas');

if (isset($_GET['logout'])) {
    $_SESSION['logget'] = 0;
    App::redirectLogin();
}
// ar prisijunges
if (!isset($_SESSION['logget']) || $_SESSION['logget'] != 1) {
    App::redirectLogin();
}

// if (!isset($_SESSION['a'])) {
//     App::createSesionA();
// }

// AUGINIMO SCENARIJUS
if (isset($_POST['auginti'])) {
    App::raise($store);
    // App::raise();
    header('Location: http://localhost/phpNd/plants/growGrass');
    exit;
}
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
                <a href="http://localhost/phpNd/plants/plantGrass">Sodinti</a>
                <a href="http://localhost/phpNd/plants/harvestGrass">Derlius</a>
                <a href="http://localhost/phpNd/plants/loginPlant">Exit</a>
            </nav>
        </div>
    </div>
    <form class="container" action="<?= URL . 'growGrass' ?>" method="post">
        <?php foreach ($store->getAll() as $augalas) : ?>
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
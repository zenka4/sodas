<?php
include __DIR__ . '/vendor/autoload.php';

use Jeff\App;
use Jeff\Agurkas;

// include __DIR__ . '/App.php';
// include __DIR__ . '/Agurkas.php';
// include __DIR__ . '/Zirnis.php';
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
// viso derliaus nuemimas is tam tikro augalo
if (isset($_POST['all'])) {
    App::allFromThisPlant();
    // foreach ($_SESSION['a'] as $index => &$augalas) {
    //     if ($_POST['all'] == $augalas->id) {
    //         $augalas->allOfPlant();
    //     }
    // }
    App::redirectHarvest();
}
// kiek derliaus nuimti
if (isset($_POST['israut'])) {
    App::howMuchHarvestDelete();
    App::redirectHarvest();
}
// is visu augalu derliaus nuemimas
if (isset($_POST['allOfAll'])) {
    Agurkas::allOfAllCompletely();
}

// if (isset($_POST['israut'])) {
//     foreach ($_SESSION['a'] as $index => &$antiCovid) {
//         if ($_POST['israut'] == $antiCovid->{'id'}) {
//             if ((int)($_POST['kiekRaut'][$antiCovid->{'id'}]) <= $antiCovid->{'kankoreziai'}) {
//                 $antiCovid->{'kankoreziai'} -= (int)$_POST['kiekRaut'][$antiCovid->{'id'}];
//             } else {
//                 $antiCovid->{'kankoreziai'} = 0;
//             }
//         }
//     }
//     header('Location: http://localhost/phpNd/plants/harvestGrass.php');
//     exit;
// }


?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>harvest</title>
    <link rel="stylesheet" href="antiW.css">
</head>

<body>
    <h1>Mari Ivana sodas</h1>
    <div class="container">
        <div class="row">
            <h2>Derlius</h2>
            <nav class="menu">
                <a href="http://localhost/phpNd/plants/plantGrass.php">Sodinti</a>
                <a href="http://localhost/phpNd/plants/growGrass.php">Auginti</a>
                <a href="?logout">Exit</a>
            </nav>
        </div>
    </div>
    <form class="container" action="" method="post">

        <?php foreach ($_SESSION['a'] as $augalas) : ?>
            <?php $augalas = unserialize($augalas) ?>
            <div class="row">
                <img src="./img/<?= $augalas->photo ?>.jpg" alt="">
                <div class="forma">
                    <p class="hrv">ANTI-COV-WEED nr. <?= $augalas->id ?><span>Kankorėžių: <?= $augalas->kazkasIsaugo ?></span></p>
                    <input type="text" name="kiekRaut[<?= $augalas->id ?>]">
                    <button type="submit" name="israut" value="<?= $augalas->id ?>">skinti</button>
                    <button type="submit" name="all" value="<?= $augalas->id ?>">skinti visus</button>
                </div>
            </div>

        <?php endforeach ?>

        <div class="row">
            <button type="submit" name="allOfAll">all completely</button>
        </div>
    </form>



</body>

</html>
<?php
defined('DOOR_BELL') || die('nelipk pro langa');
// include __DIR__ . '/vendor/autoload.php';

use Jeff\App;
use Jeff\Agurkas;

$store = new Jeff\Store('augalas');

if (isset($_GET['logout'])) {
    $_SESSION['logget'] = 0;
    App::redirectLogin();
}
if (!isset($_SESSION['logget']) || $_SESSION['logget'] != 1) {
    App::redirectLogin();
}

// if (!isset($_SESSION['a'])) {
//     App::createSesionA();
// }
// viso derliaus nuemimas is tam tikro augalo
if (isset($_POST['all'])) {
    App::allFromThisPlant($store);
    App::redirectHarvest();
}
// kiek derliaus nuimti
if (isset($_POST['israut'])) {
    App::howMuchHarvestDelete($store);
    App::redirectHarvest();
}
// is visu augalu derliaus nuemimas
if (isset($_POST['allOfAll'])) {
    Agurkas::allOfAllCompletely($store);
}
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
                <a href="http://localhost/phpNd/plants/plantGrass">Sodinti</a>
                <a href="http://localhost/phpNd/plants/growGrass">Auginti</a>
                <a href="?logout">Exit</a>
            </nav>
        </div>
    </div>
    <form class="container" action="" method="post">
        <?php foreach ($store->getAll() as $augalas) : ?>

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
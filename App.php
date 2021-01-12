<?php

namespace Jeff;

class App
{
    public static function route()
    {
        $uri = str_replace(INSTALL_FOLDER, '', $_SERVER['REQUEST_URI']);
        $uri = explode('/', $uri);
        if ($uri[0] == 'loginPlant') {
            include __DIR__ . '/loginPlant.php';
        } elseif ($uri[0] == 'plantGrass') {
            include __DIR__ . '/plantGrass.php';
        } elseif ($uri[0] == 'growGrass') {
            include __DIR__ . '/growGrass.php';
        } elseif ($uri[0] == 'harvestGrass') {
            include __DIR__ . '/harvestGrass.php';
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public static function createSesionA()
    {
        $_SESSION['a'] = [];
        $_SESSION['augalo ID'] = 0;
    }
    /////////////////////////////////////////////////////////////////////////////////////
    // public static function addPlant($which)
    // {
    //     $kuris = $which;
    //     if ($kuris == 1) {
    //         $agurkasObj = new Agurkas($Store->getNewId);
    //         $agurkasObj->plant($agurkasObj);
    //     } elseif ($kuris == 2) {
    //         $zirnisObj = new Zirnis($Store->getNewId);
    //         $zirnisObj->plant($zirnisObj);
    //     }
    // }

    public static function addPlant($which)
    {
        $kuris = $which;
        if ($kuris == 1) {
            $agurkasObj = new Agurkas(++$_SESSION['augalo ID']);
            $agurkasObj->plant($agurkasObj);
        } elseif ($kuris == 2) {
            $zirnisObj = new Zirnis(++$_SESSION['augalo ID']);
            $zirnisObj->plant($zirnisObj);
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public static function deletePlant()
    {
        foreach ($_SESSION['a'] as $index => $augalas) {
            $augalas = unserialize($augalas);
            if ($_POST['rauti'] == $augalas->id) {
                unset($_SESSION['a'][$index]);
            }
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public static function raiseS($store)
    {

        foreach ($store->getData()['a'] as $index => $augalas) {

            $augalas = unserialize($augalas);

            $augalas->auginti($_POST['kiekis'][$augalas->id]);
            _d($augalas);
            $store->save($augalas, $index);
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public static function raise()
    {
        foreach ($_SESSION['a'] as $index => $augalas) {
            $augalas = unserialize($augalas);
            $augalas->auginti($_POST['kiekis'][$augalas->id]);
            $augalas = serialize($augalas);
            $_SESSION['a'][$index] = $augalas;
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public static function howMuchHarvestDelete()
    {
        foreach ($_SESSION['a'] as $index => $augalas) {
            $augalas = unserialize($augalas);
            $augalas->kiekTrint($_POST['kiekRaut'][$augalas->id]);
            $augalas = serialize($augalas);
            $_SESSION['a'][$index] = $augalas;
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public  static function allFromThisPlant()
    {
        foreach ($_SESSION['a'] as $index => $augalas) {
            $augalas = unserialize($augalas);
            if ($_POST['all'] == $augalas->id) {
                $augalas->allOfPlant();
                $augalas = serialize($augalas);
                $_SESSION['a'][$index] = $augalas;
            }
        }
    }
    /////////////////////////////////////*******REDIRECT' AI **********/////////////////////
    public static function redirectLogin()
    {
        header('Location:' . URL . 'loginPlant');
        die;
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public static function redirectPlant()
    {
        header('Location:' . URL . 'plantGrass');
        exit;
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public static function redirectHarvest()
    {
        header('Location:' . URL . 'harvestGrass');
        exit;
    }
}

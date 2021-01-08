<?php

namespace Jeff;

class App
{

    public static function createSesionA()
    {
        $_SESSION['a'] = [];
        $_SESSION['augalo ID'] = 0;
    }
    // public static function addPlant()
    // {
    //     $agurkasObj = new Agurkas(++$_SESSION['augalo ID']);
    //     $agurkasObj->plant($agurkasObj);
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
        header('location:http://localhost/phpNd/plants/loginPlant.php');
        die;
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public static function redirectPlant()
    {
        header('Location: http://localhost/phpNd/plants/plantGrass.php');
        exit;
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public static function redirectHarvest()
    {
        header('Location: http://localhost/phpNd/plants/harvestGrass.php');
        exit;
    }
}

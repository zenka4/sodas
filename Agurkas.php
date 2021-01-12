<?php

namespace Jeff;

class Agurkas extends ProsenelinisAugalas
{

    public $photo;
    ///////////////////////////////_____CONSTRUKTOR_________________/////////////////////
    public  function __construct($id)
    {
        $this->id = $id;
        $this->photo();
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public static function allOfAllCompletely()
    {
        foreach ($_SESSION['a'] as $index => $augalas) {
            $augalas = unserialize($augalas);
            $augalas->allOfPlant();
            $augalas = serialize($augalas);
            $_SESSION['a'][$index] = $augalas;
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function plant($agurkasObj)
    {
        $this->agurkasObj = $agurkasObj;
        $_SESSION['a'][] = serialize($agurkasObj);
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function kiek()
    {
        return $this->kiek = rand(5, 9);
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function photo()
    {
        return $this->photo = rand(1, 5);
    }
}

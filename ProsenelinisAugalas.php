<?php

namespace Jeff;

abstract class ProsenelinisAugalas
{
    public $id = 0;
    public $kazkasIsaugo = 0;
    ///////////////////////////////_____CONSTRUKTOR_________________/////////////////////
    public  function __construct($id)
    {
        $this->id = $id;
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
        $this->kiek = rand(5, 9);
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function auginti($kiekAuginti)
    {
        $this->kazkasIsaugo = $this->kazkasIsaugo + $kiekAuginti;
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function kiekTrint($kiekis)
    {
        $this->kiekis = $kiekis;
        if ((int)$kiekis < $this->kazkasIsaugo) {
            return $this->kazkasIsaugo = $this->kazkasIsaugo - (int)$this->kiekis;
        } else {
            return $this->kazkasIsaugo = 0;
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function allOfPlant()
    {
        return $this->kazkasIsaugo = 0;
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function photo()
    {
        return $this->photo = rand(1, 5);
    }
}

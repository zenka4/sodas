<?php

namespace Jeff;

class Zirnis
{
    public $id = 0;
    public $kazkasIsaugo = 0;
    public $photo;
    ///////////////////////////////_____CONSTRUKTOR_________________/////////////////////
    public  function __construct($id)
    {
        $this->id = $id;
        $this->photo();
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function plant($zirnisObj)
    {
        $this->zirnisObj = $zirnisObj;
        $_SESSION['a'][] = serialize($zirnisObj);
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function kiek()
    {
        return $this->kiek = rand(2, 8);
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
        return $this->photo = rand(6, 10);
    }
}

<?php

namespace Jeff;

class Zirnis extends ProsenelinisAugalas
{
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
    public function photo()
    {
        return $this->photo = rand(6, 10);
    }
}

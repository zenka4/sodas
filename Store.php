<?php

namespace Jeff;

class Store
{
    private const PATH = __DIR__ . '/data/';
    private $fileName = 'sodas';
    private $data;
    /////////////////////////////////////////////////////////////////////////////////////
    public function __construct($file)
    {
        $this->fileName = $file;
        if (!file_exists(self::PATH . $this->fileName . '.json')) {
            file_put_contents(self::PATH . $this->fileName . '.json', json_encode(['a' => [], 'augalo ID' => 0])); // pradinis masyvas
            $this->data = ['a' => [], 'augalo ID' => 0];
        } else {
            $this->data = file_get_contents(self::PATH . $this->fileName . '.json'); // nuskaitom faila
            $this->data = json_decode($this->data, 1); // paverciam masyvu
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function __destruct()
    {
        file_put_contents(self::PATH . $this->fileName . '.json', json_encode($this->data)); // viska vel uzsaugom faile
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function getData()
    {
        return $this->data;
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function setData($data)
    {
        $this->data = $data;
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function getNewId()
    {
        $id = $this->data['augalo ID'];
        $this->data['augalo ID']++;
        return $id;
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function addPlant($which)
    {
        $kuris = $which;
        if ($kuris == 1) {
            $agurkasObj = new Agurkas($this->getNewId());
            $this->addNew($agurkasObj);
        } elseif ($kuris == 2) {
            $zirnisObj = new Zirnis($this->getNewId());
            $this->addNew($zirnisObj);
        }
    }
    /////////////////////////////////////////////////////////////////////////////////////

    public function addNew($obj)
    {
        $this->data['a'][] = serialize($obj);
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function getAll()
    {
        $all = [];
        foreach ($this->data['a'] as $augalas) {
            $all[] = unserialize($augalas);
        }
        return $all;
    }
    /////////////////////////////////////////////////////////////////////////////////////
    public function deletePlant($id)
    {
        foreach ($this->data['a'] as $index => $obj) {
            $obj = unserialize($obj);
            if ($obj->id == $id) {
                unset($this->data['a'][$index]);
            }
        }
    }
    public function save($augalas, $index)
    {
        $augalas = serialize($augalas);
        $this->data['a'][$index] = $augalas;
    }
}

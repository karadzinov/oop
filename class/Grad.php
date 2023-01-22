<?php
require_once "header.php";

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

class Grad extends DB implements Model
{

    private $name;
    private $citizens;
    private $buildings;
    private $id;

    const TableName = 'cities';

    public function __construct()
    {
        parent::__construct(self::TableName);
    }


    public function getName()
    {
        return $this->name;
    }

    public function getCitizens()
    {
        return $this->citizens;
    }

    public function getBuildings()
    {
        return $this->buildings;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function setCitizens($citizens)
    {
        $this->citizens = $citizens;
    }

    public function setBuildings($buildings)
    {
        $this->buildings = $buildings;
    }

    public function save()
    {
        $data = [
            'name' => $this->name,
            'citizen' => $this->citizens,
            'building' => $this->buildings
        ];

        $this->id = $this->update($this->id, $data);
    }

    public function create()
    {
        $data = [
            'name' => $this->name,
            'citizen' => $this->citizens,
            'building' => $this->buildings
        ];

        $this->id = $this->insert($data);
    }

    public function first($id)
    {
        $result = $this->get($id);
        $this->id = $result->id;
        $this->name = $result->name;
        $this->buildings = $result->building;
        $this->citizens = $result->citizen;

        return $this;
    }
}
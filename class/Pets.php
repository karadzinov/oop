<?php


class Pets {
    public $name;
    public $type;


    public function __construct($name, $type)
    {
        $this->name = $name;
        $this->type = $type;
    }


    private function petInfo()
    {
        return "You have pet that is ".  $this->type . " and your pet's name is ". $this->name .'!';
    }

    public function action($action)
    {
        return $this->petInfo()." Your pet makes: " . $action;
    }


}
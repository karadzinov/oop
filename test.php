<?php

require_once "header.php";

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

$grad = new Grad();
$grad->first(1);
$grad->setBuildings("2000");
$grad->setName("Ohrid");
$grad->setCitizens("400000");
$grad->save();
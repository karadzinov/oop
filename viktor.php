<?php
require_once "header.php";

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});

$mirko = new Client();

$mirko->setName('Mirko');
$mirko->setEmail('mirko@gmail.com');
$mirko->setLocation('Ohrid');
$mirko->setPassword('temp1234');
$mirko->setImage('ab.jpg');
// $mirko->create();


$client = new Client();
$client->first(1);
$client->setName('Petko');
$client->setLocation('Resen');
$client->setImage('bc.jpg');
$client->setPassword('temp4321');
$client->setEmail('petko@gmail.com');
$client->save();










var_dump($client);

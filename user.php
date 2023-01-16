<?php


require_once "header.php";

spl_autoload_register(function ($class) {
    include 'class/' . $class . '.php';
});


$user = new User();
$user->first($_GET['id']);


echo $user->getEmail();
<?php


spl_autoload_register(function ($class) {
    include '../class/' . $class . '.php';
});

$id = $_GET['cat_id'];
$category = new Categories();

$category->first($id);
$category->remove($id);

header('Location: ../categories.php');
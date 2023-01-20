<?php

spl_autoload_register(function ($class) {
    include '../class/' . $class . '.php';
});



if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = $_POST['name'];
} else {
    $name = '';
}

if (isset($_POST['parent_id']) && !empty($_POST['parent_id'])) {
    $parent_id = $_POST['parent_id'];
} else {
    $parent_id = 0;
}

$category = new Categories();
$category->setName($name);
$category->setParentId($parent_id);
$category->create();




if($category) {
    header('Location: /categories.php');
} else {
    header('Location: 404.php');
}


<?php

spl_autoload_register(function ($class) {
    include '../class/' . $class . '.php';
});



if (isset($_POST['name']) && !empty($_POST['name'])) {
    $name = $_POST['name'];
} else {
    $name = '';
}

if (isset($_POST['description']) && !empty($_POST['description'])) {
    $description = $_POST['description'];
} else {
    $description = '';
}

if (isset($_POST['sex']) && !empty($_POST['sex'])) {
    $type = $_POST['sex'];
} else {
    $type = '';
}

if (isset($_POST['price']) && !empty($_POST['price'])) {
    $price = $_POST['price'];
} else {
    $price = '';
}

if (isset($_POST['cat_id']) && !empty($_POST['cat_id'])) {
    $cat_id = $_POST['cat_id'];
} else {
    $cat_id = '';
}

// $image = uploadImage($_FILES["image"], "../images/");
$image = NULL;

if(is_array($image)) {
    print_r($image["error"]);
    die();
}


$product = new Product();
$product->setName($name);
$product->setImage($image);
$product->setDescription($description);
$product->setType($type);
$product->setPrice($price);
$product->setCatId($cat_id);
$product->create();


if($product) {
    header('Location: /products.php');
} else {
    header('Location: 404.php');
}


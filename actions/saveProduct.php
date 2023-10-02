<?php 
require_once '../Product/autoload.php';
Autoloader::register();

$productData = (object) $_POST;
$className = 'Product\\' . ucfirst($_POST['type']);




$newProduct = new $className;
$newProduct->save($productData);

header('Location:../index.php');

exit; 



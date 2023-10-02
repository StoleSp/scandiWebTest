<?php
require_once '../Product/autoload.php';
Autoloader::register();
use Product\Product;

$deleteProduct = new Product();
$deleteProduct->delete($_POST['selected']);


header('Location:../index.php');
exit;
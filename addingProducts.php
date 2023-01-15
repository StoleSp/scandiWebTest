<?php

require_once "./products.php";
require_once "./furniture.php";
require_once "./book.php";
require_once "./disc.php";
require_once "./functions.php";



$newProduct = new $_POST['productType'];
$newProduct->AddToDb($_POST);

redirect("index.php");


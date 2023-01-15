<?php 

require_once "./products.php";
require_once "./functions.php";

$delteCards = new Product();
$delteCards->deleteCards($_GET);

redirect("index.php");





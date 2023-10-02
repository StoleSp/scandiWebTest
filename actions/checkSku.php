<?php 
require_once '../Product/autoload.php';
Autoloader::register();

use Product\Product;

$checkSku = new Product();
$result = $checkSku->checkSku($_POST['id']);
echo json_encode($result);

exit;
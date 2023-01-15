<?php



require_once "./products.php";
require_once "./furniture.php";
require_once "./book.php";
require_once "./disc.php";
require_once "./functions.php";



$book = new Book();
$book->displayBook();

$disc = new DVD();
$disc->displayDisc();

$furniture = new Furniture();
$furniture->displayFurniture();


//this is an empty array in which data from db and new $p elements(notations) are aded. proccess is reapeated for each database table 
$re_dvddisk = array();

foreach ($disc->displayDisc() as $p) {
    $p["table_name"] = "dvd_disc";
    $p["values"] = "Size: " . $p["size_mb"];
    array_push($re_dvddisk, $p);
};

$re_book = array();

foreach ($book->displayBook() as $p) {
    $p["table_name"] = "book";
    $p["values"] = "Weight: " . $p["weight_kg"];
    array_push($re_book, $p);
};

$re_furniture = array();

foreach ($furniture->displayFurniture() as $p) {
    $p["table_name"] = "chair";
    $p["values"] = "Dimensions: " . $p["height_cm"] . " x " . $p["width_cm"] . " x " . $p["length_cm"];
    array_push($re_furniture , $p);
};

//all 3 arrays are merged in one array $r and than from it with loop the cards are printed.
$r = array_merge($re_furniture , $re_book, $re_dvddisk);

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product list</title>

    <link rel="stylesheet" href="./assets/bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
    <form action="deleteProduct.php" method="GET">
        <div>
            <div class="navbar navbar-light py-4">
                <h1>Product list</h1>
                <div class="buttons">
                    <a href="addProduct.php"><button id="add-product-btn" class="btn btn btn-outline-dark">ADD</button></a>
                    <button id="delete-product-btn" class="btn btn btn-outline-dark" type="submit">MASS DELETE</button>
                </div>

            </div>
            <hr class="bg-dark m-0 p-0">
            <div class="bg-light container-wrapper">
                <div class="card-container  d-flex justify-content-between p-4 flex-wrap">
                    <?php
                    foreach ($r as $product) {
                    ?>
                        <div class="card text-center mb-4">
                            <input type="checkbox" class="delete-checkbox" id="<?= $product['id']; ?>" value="<?= $product["table_name"]; ?>" name="<?= $product['id'] ?>">
                            <div class="card-body">
                                <h5 class="card-title"><?= $product['SKU']; ?></h5>
                                <p class="card-text"><?= $product['name']; ?></p>
                                <p class="card-text"><?= $product['price_$']; ?></p>
                                <p class="card-text"><?= $product['values']; ?></p>

                            </div>
                        </div>
                    <?php }
                    ?>
                </div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="./assets/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
    <script src="./index.js"></script>
</body>

</html>
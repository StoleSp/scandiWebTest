<?php
require_once './Product/autoload.php';
Autoloader::register();

use Product\Product;

$product = new Product();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product List</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="style.css">
</head>

<body>
    <form action="./actions/deleteProduct.php" method="post">

        <!-- header -->
        <div class="d-flex justify-content-between align-items-center py-2 px-3">
            <h1>
                Product List
            </h1>
            <div>
                <a href="addProduct.php" class="btn btn-outline-dark mx-3"> ADD </a>
                <button type="submit" class="btn btn-outline-dark" id="delete-product-btn">
                    MASS DELETE
                </button>
            </div>

        </div>

        <hr class="py-0 my-0 mx-3 border border-dark border-2  opacity-75">

        <!-- main content -->
        <div class="container">
            <div class=" d-flex flex-wrap justify-content-evenly py-5">

                <?php
                foreach ($product->display() as $productData) {

                    $productType = ucfirst($productData->type);
                    $className = 'Product\\' . $productType;

                    $productAtributes = new $className;
                    $formattedDimensions = $productAtributes->displayAtribute($productData->id);

                    // print_r($formattedDimensions);

                ?>

                    <div class="card mt-3 text-center" style="width: 18rem;">
                        <div class="card-body">
                            <input type="checkbox" class="delete-checkbox" name="selected[]" value="<?= $productData->id  ?>" id="<?= $productData->id  ?>">
                            <p class="card-text">SKU:<?= $productData->sku ?></p>
                            <p class="card-text"><?= $productData->name  ?></p>
                            <p class="card-text"><?= $product->checkDecimal($productData->price) ?>$</p>
                            <p class="card-text"><?=
                                                     $formattedDimensions
                                                    ?></p>
                        </div>
                    </div>

                <?php } ?>
            </div>

        </div>
    </form>

    <!-- footer -->
    <footer>
        <hr class="py-0 my-0 mx-3 border border-dark border-2  opacity-75">
        <div class="d-flex justify-content-center py-4">
            <p class="fw-semibold fst-italic p-0 m-0">
                Scandiweb Test Assigment
            </p>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="js/index.js"></script>
</body>

</html>
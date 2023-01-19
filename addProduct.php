<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product Add</title>

    <link rel="stylesheet" href="./assets/bootstrap-4.6.2-dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="./assets/style.css">
</head>

<body>
    <div class="alert alert-danger position-absolute col-6 offset-3" id="alert"></div>

    <div class="navbar py-4 ">
        <h1>Product Add</h1>

        <div class="buttons">
            <button id="save-product-btn" class="btn btn btn-outline-dark">Save</button>
            <button id="cancel-product-btn" class="btn btn btn-outline-dark">Cancel</button>
        </div>

    </div>
    <hr class="bg-dark m-0">
    <form action="addingProducts.php" method="POST" id="product_form">
        <div class="d-flex bg-light">
            <div class="d-flex flex-column w-25 p-3 border border-dark-50 rounded mt-3 ml-3 bg-white ">
                <label for="sku">SKU:</label>
                <input class="form-control" type="text" id="sku" name="sku" placeholder="Enter SKU">
                <label for="name">Name:</label>
                <input class="form-control" type="text" id="name" name="name" placeholder="Enter name">
                <label for="price">Price:</label>
                <input class="form-control" type="text" id="price" name="price" placeholder="Enter price">
                <label for="Select">Choose a product</label>
                <select id="productType" class="custom-select" name="productType">
                    <option value="Furniture">Furniture</option>
                    <option value="Book">book</option>
                    <option value="DVD">DVD</option>
                </select>
                <div id="inputContainer" class="mb-5">

                </div>
            </div>
        </div>
    </form>

    <script src="https://code.jquery.com/jquery-3.6.1.js" integrity="sha256-3zlB5s2uwoUzrXK3BT7AX3FyvojsraNFxCc2vC/7pNI=" crossorigin="anonymous"></script>
    <script src="./assets/bootstrap-4.6.2-dist/js/bootstrap.min.js"></script>
    <script src="addProduct.js"></script>
    <script src="inputValidation.js"></script>
</body>

</html>
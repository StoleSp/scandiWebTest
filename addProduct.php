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
    <div class="alert alert-danger" id="alertDanger">Please, provide the data of indicated type</div>
    <form id="product_form" action="./actions/saveProduct.php" method="POST">
        <!-- header -->
        <div class="d-flex justify-content-between align-items-center py-2 px-3">
            <h1>
                Product List
            </h1>
            <div class="d-flex justify-content-between">
                <button class="btn btn-outline-dark mx-3" type="submit">
                    Save
                </button>
                <a href="index.php" class="btn btn-outline-dark"> Cancel </a>
            </div>

        </div>

        <hr class="py-0 my-0 mx-3 border border-dark border-2 opacity-75">

        <!-- main content -->
        <div class="container py-3">
            <div class="col-5 ">
                <div class="d-flex justify-content-between py-3">
                    <label class="" for="sku">SKU</label>
                    <input type="text" id="sku" name="sku" class="form-control w-75" placeholder="Product SKU">
                </div>
                <div class="d-flex justify-content-between py-3">
                    <label class="" for="name">Name</label>
                    <input type="text" id="name" name="name" class="form-control w-75" placeholder="Product Name">
                </div>
                <div class="d-flex justify-content-between py-3">
                    <label class="" for="price">Price ($)</label>
                    <input type="text" id="price" name="price" class="form-control w-75 decimal" placeholder="Product price in USD">
                </div>
                <div class="d-flex justify-content-between py-3">
                    <label class="" for="select">Product</label>
                    <select name="type" class="form-control w-75" id="productType" required>
                        <!-- <option value="" selected disabled data-target="#disabled">Select product..</option> -->
                        <option value="furniture" data-target="#furniture-data">Furniture</option>
                        <option value="book" data-target="#book-data">Book</option>
                        <option value="disc" data-target="#disc-data">DVD</option>
                    </select>
                </div>
                <div id="input-container">
                    <div id="disc-data" class="product-data" style="display: none;">
                        <div class="d-flex justify-content-between py-3">
                            <label class="" for="size">Size (MB)</label>
                            <input type="text"   name="size" id="size" class="form-control w-75 decimal" placeholder="Disc size in MB">
                        </div>
                        
                        <div class="text-center m-0 p-0"><small ><i><u>Please, provide size</u></i></small></div>
                    </div>

                    <div id="furniture-data" class="product-data" style="display: none;">
                        <div class="d-flex justify-content-between py-3">
                            <label class="" for="height">Height (CM)</label>
                            <input type="text" name="height" id="height" class="form-control w-75 decimal" placeholder="Product Height in cm">
                        </div>
                        <div class="d-flex justify-content-between py-3">
                            <label class="" for="length">Length (CM)</label>
                            <input type="text" id="length" name="length" class="form-control w-75 decimal" placeholder="Product Length in cm">
                        </div>
                        <div class="d-flex justify-content-between py-3">
                            <label class="" for="width">Width (CM)</label>
                            <input type="text" id="width" name="width" class="form-control w-75 decimal" placeholder="Product Width in cm">
                        </div>
                        <div class="text-center m-0 p-0"><small ><i><u>Please, provide dimensions</u></i></small></div>
                    </div>

                    <div id="book-data" class="product-data" style="display: none;">
                        <div class="d-flex justify-content-between py-3">
                            <label class="" for="weight">Weight (KG)</label>
                            <input type="text" id="weight" name="weight" class="form-control w-75 decimal" placeholder="Product Weight in kg">
                        </div>
                        <div class="text-center m-0 p-0"><small ><i><u>Please, provide weight</u></i></small></div>
                    </div>

                </div>
            </div>
        </div>

    </form>

    <!-- footer -->
    <footer>
        <div class="bottom">
            <hr class="py-0 my-0 mx-3 border border-dark border-2  opacity-75">
            <div class="d-flex justify-content-center py-4">
                <p class="fw-semibold fst-italic p-0 m-0">
                    Scandiweb Test Assigment
                </p>
            </div>
        </div>
    </footer>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/js/bootstrap.bundle.min.js" integrity="sha384-HwwvtgBNo3bZJJLYd8oVXjrBZt8cqVSpeBNS5n7C8IVInixGAoxmnlMuBnhbgrkm" crossorigin="anonymous"></script>
    <script src="js/addProduct.js"></script>
</body>

</html>
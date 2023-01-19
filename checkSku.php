<?php

require_once "./products.php";

  $id = $_POST['id'];
  $che = new Product();
  echo $che->checkSku($id);




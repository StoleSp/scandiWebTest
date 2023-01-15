<?php

require_once "./products.php";

  $id = $_POST['id'];
  $che = new Product();
  $che->checkSku();
//this is where the SKUs from the data base are checked if they match the written text in the sku input that is send with AJAX POST method.
    foreach($che->checkSku() as $value){
        foreach($value as $val){
            if($id == $val){
                echo true;
            }
        }   
    }



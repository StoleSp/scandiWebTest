<?php

namespace Product;

use PDO;


class Product
{

    private $dbHost = 'localhost';
    private $dbPort = '3306';
    private $dbName = 'scandiwebtest2';
    private $dbUsername = 'root';
    private $dbPassword = '';
   
    protected $productId;

    private $conn;


    public function getLastProductId()
    {
        return $this->productId;
    }

    public function __construct()
    {
        $this->conn = new PDO(
            "mysql:
        host=" . $this->dbHost . ";
        port=" . $this->dbPort. ";
        dbname=" . $this->dbName . ";
        ",
            $this->dbUsername,
            $this->dbPassword
        );
    }

    public function getConn()
    {
        return $this->conn;
    }

    public function save($data)
    {
        $querry = "INSERT INTO product(sku,name,price,created_at,type) VALUES(:sku,:name,:price,:created_at,:type)";
        $stmt = $this->getConn()->prepare($querry);
        $stmt->execute([
            'sku' => $data->sku,
            'name' => $data->name,
            'price' => $data->price,
            'created_at' => date('Y-m-d'),
            'type' => $data->type
        ]);


        $this->productId = $this->getConn()->lastInsertId();
    }


    public function display()
    {
        $querry = "SELECT p.*,f.height,f.length, f.width,b.weight,d.size FROM product p LEFT JOIN furniture f  ON f.product_id = p.id LEFT JOIN book b ON b.product_id = p.id LEFT JOIN disc d ON d.product_id = p.id ";
        $stmt = $this->getConn()->prepare($querry);
        $stmt->execute();

        return $stmt->fetchAll(PDO::FETCH_OBJ);
    }



    public function delete($deleted)
    {
        $querry = 'DELETE FROM product WHERE id IN (' . implode(',', $deleted) . ')';
        $stmt = $this->getConn()->prepare($querry);
        $stmt->execute();
    }

    public function checkDecimal($data) 
    {
        $decimalNumber = explode('.', $data);
        if ($decimalNumber[1] == '00') {
            return $decimalNumber[0];
        } else {
            return $data;
        }
    }

    public function checkSku($data) : bool
    {
        $sku = "SELECT sku FROM product";
        $stmt = $this->getConn()->prepare($sku);
        $stmt->execute();
        $dbSku = $stmt->fetchAll(PDO::FETCH_COLUMN);

        foreach($dbSku as $val) {
            if ($data == '' || $data == $val) {
                return true;
            }
        }

        return false;
    }
}

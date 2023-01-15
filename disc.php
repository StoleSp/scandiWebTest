<?php

require_once "./products.php";

class DVD extends Product
{

    public function AddToDb($arr)
    {
        $sql = "INSERT INTO dvd_disc(SKU,name,price_$,size_mb) VALUES (:SKU,:name,:price,:size)";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->execute(
            [
                'SKU' => $arr['sku'],
                'name' => $arr['name'],
                'price' => $arr['price'],
                'size' => $arr['size']
            ]
        );
    }

    
    public function displayDisc(){
            
        $disc = 'SELECT * FROM `dvd_disc`';
        $stmt = $this->getConn()->prepare($disc);
        $stmt->execute();
        $productDisc = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productDisc;
    }
}

<?php

require_once "./products.php";

class Furniture extends Product
{
 

    public function AddToDb($arr)
    {
        $message = "fail";
        $sql = "INSERT INTO chair(SKU,name,price_$,height_cm,width_cm,length_cm) VALUES (:SKU,:name,:price,:height,:width,:length)";
        $stmt = $this->getConn()->prepare($sql);

        if( $stmt->execute(
            [
                'SKU' => $arr['sku'],
                'name' => $arr['name'],
                'price' => $arr['price'],
                'height' =>  $arr['height'],
                'width' =>  $arr['width'],
                'length' =>  $arr['length']
            ]
        )){
            $message = "success";
        }
        return $message;
    }


    public function displayFurniture(){
            
        $furniture = 'SELECT * FROM `chair`';
        $stmt = $this->getConn()->prepare($furniture);
        $stmt->execute();
        $productChair = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productChair;
    }

 
}


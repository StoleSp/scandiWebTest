<?php 

require_once "./products.php";

class Book extends Product
{
    public function AddToDb($arr)
    {
        $sql = "INSERT INTO book(SKU,name,price_$,weight_kg) VALUES (:SKU,:name,:price,:weight)";
        $stmt = $this->getConn()->prepare($sql);
        $stmt->execute(
            [
                'SKU' => $arr['sku'],
                'name' => $arr['name'],
                'price' => $arr['price'],
                'weight' => $arr['weight']
            ]
        );
    }

    public function displayBook(){
            
        $book = 'SELECT * FROM `book`';
        $stmt = $this->getConn()->prepare($book);
        $stmt->execute();
        $productBook = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $productBook;
    }
}



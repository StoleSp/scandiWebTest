<?php
namespace Product;
use PDO;
class Furniture extends Product
{




    public function save($data) 
    {
        parent::save($data);

        $querry = 'INSERT INTO furniture(length,width,height,product_id) VALUES(:length,:width,:height,:product_id)';
        $stmt = $this->getConn()->prepare($querry);
        $stmt->execute([
            'length' => $data->length,
            'width' => $data->width,
            'height' => $data->height,
            'product_id' => $this->getLastProductId()
        ]);
    }

    public function displayAtribute($id) {
        $query = 'SELECT * FROM furniture WHERE product_id = :id';
        $stmt = $this->getConn()->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);
        $result = $stmt->fetch(PDO::FETCH_OBJ);
        $formattedDimensions = 'Dimensions(HxWxL): ' . $this->checkDecimal($result->height)  . 'x' . $this->checkDecimal($result->width) . 'x' .  $this->checkDecimal($result->length)  ;
        
        return $formattedDimensions;
        
    }

}

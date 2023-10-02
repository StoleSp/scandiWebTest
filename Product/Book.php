<?php
namespace Product;

class Book extends Product {

    private $weight;


    

     
    public function save($data)
    {
        parent::save($data);

        $querry = 'INSERT INTO book(weight,product_id) VALUES (:weight,:product_id)';

        $stmt = $this->getConn()->prepare($querry);
        $stmt->execute([
            'weight' => $data->weight,
            'product_id' => $this->getLastProductId()
        ]);
    }

    public function displayAtribute($id)
    {
        $query = 'SELECT weight FROM book WHERE product_id = :id';
        $stmt = $this->getConn()->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);
        $result = $stmt->fetchColumn();

        if ($result !== false) {
            return 'Weight: ' . $this->checkDecimal($result);
        }

        return '';
    }


}
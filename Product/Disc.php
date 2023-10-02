<?php
namespace Product;

class Disc extends Product {

    protected $size;



    public function save($data)
    {
        parent::save($data);

        $querry = 'INSERT INTO disc(size,product_id) VALUES(:size,:product_id)';
        $stmt = $this->getConn()->prepare($querry);
        $stmt->execute([
            'size' => $data->size,
            'product_id' => $this->getLastProductId()
        ]);
    }

    public function displayAtribute($id)
    {
        $query = 'SELECT size FROM disc WHERE product_id = :id';
        $stmt = $this->getConn()->prepare($query);
        $stmt->execute([
            'id' => $id
        ]);
        $result = $stmt->fetchColumn();

        if ($result !== false) {
            return 'Size: ' . $this->checkDecimal($result);
        }

        return '';
    }
}
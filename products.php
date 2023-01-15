<?php 

class Product
{

    private $conn;

    public function __construct()
    {
        $this->conn = new PDO("mysql:host=localhost;dbname=scandiwebtest;", "root", "");
    }

    public function getConn()
    {
        return $this->conn;
    }

    //  class method for deleting cards from the database. When called it receives the list sent through the GET method from a form.
    public function deleteCards($arr)
    {
        foreach($arr as $id => $table){
            $query = 'DELETE FROM ' . $table . ' WHERE ID =' . $id; 
            $stmt = $this->getConn()->prepare($query);
            $stmt->execute();
        }
    }

  //class method that selects all SKUs from the database so they could be checked if any of them is equal to what is written in the SKU input in the form
    public function checkSku(){
        $sku = "SELECT SKU FROM book UNION SELECT SKU FROM chair UNION SELECT SKU FROM dvd_disc;";
        $stmt = $this->getConn()->prepare($sku);
        $stmt->execute();
        $dbSku = $stmt->fetchAll(PDO::FETCH_ASSOC);
    
       return $dbSku;

    }

}
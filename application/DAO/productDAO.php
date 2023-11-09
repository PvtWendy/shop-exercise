<?php 
namespace application\DAO;
class ProductDAO {
    //Create
    public function save($product){
        $connection = new Connection();
        $conn = $connection->connect();

        $name = $product->getName();
        $brand = $product->getBrand();
        $price = $product->getPrice();

        $SQL= "INSERT INTO products (name,brand,price)   VALUES ($name, $brand, $price)";
        if($conn->query( $SQL ) === true){
            return true;
        }else{
            echo "Error: ". $SQL . "<br/>" . $conn->error;
            return false;
        }
    }
    public function getAll(){}

    //Retrieve
    public function getById($id){}

    //update
    public function update($product){}

    //delete
    public function delete($id){}

}

?>
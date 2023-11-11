<?php
namespace application\DAO;

use application\models\Product;

class ProductDAO
{
    //Create
    public function save($product)
    {
        $connection = new Connection();
        $conn = $connection->connect();

        $name = $product->getName();
        $brand = $product->getBrand();
        $price = $product->getPrice();

        $SQL = "INSERT INTO products (name,brand,price)   VALUES ('$name', '$brand', $price)";
        if ($conn->query($SQL) === true) {
            return true;
        } else {
            echo "Error: " . $SQL . "<br/>" . $conn->error;
            return false;
        }

    }
    public function getAll()
    {

        $connection = new Connection();

        $conn = $connection->connect();

        $SQL = "SELECT * FROM products";

        $result = $conn->query($SQL);

        $products = [];
        while ($row = $result->fetch_assoc()) {
            $product = new Product($row["name"], $row["brand"], $row["price"]);
            $product->setCode($row["code"]);
            array_push($products, $product);


        }
        return $products;
    }
    public function getProductById($id)
    {
        $connection = new Connection();

        $conn = $connection->connect();

        $SQL = "SELECT * FROM products where id = ". $id;

        $result = $conn->query($SQL);
        $row = $result->fetch_assoc();
        $product = new Product($row["name"], $row["brand"],$row["price"]);
        $product->setCode($row["code"]);
        return $product;


    }

    //update
    public function update($product)
    {
        $connection = new Connection();
        $conn = $connection->connect();
        
    }

    //delete
    public function delete($id)
    {
    }

}

?>
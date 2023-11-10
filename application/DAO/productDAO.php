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
            $products = new Product($row["name"], $row["brand"], $row["price"]);
            $products->setCode($row["code"]);
            array_push($products, $products);


        }
        return $products;
    }
    public function getProductById($id)
    {
        //Retrieve

    }
    public function getById($id)
    {
    }

    //update
    public function update($product)
    {
    }

    //delete
    public function delete($id)
    {
    }

}

?>
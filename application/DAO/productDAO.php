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

        $SQL = "SELECT * FROM products WHERE code = " . $id;

        $result = $conn->query($SQL);
        $row = $result->fetch_assoc();
        $product = new Product($row["name"], $row["brand"], $row["price"]);
        $product->setCode($row["code"]);
        return $product;


    }

    //update
    public function update($product)
    {
        $connection = new Connection();
        $conn = $connection->connect();

        $code = $product->getCode();
        $name = $product->getName();
        $brand = $product->getBrand();
        $price = $product->getPrice();

        $SQL = "UPDATE products SET name = '$name', brand = '$brand', price = $price WHERE code = $code ";

        if ($conn->query($SQL) === true) {
            return true;
        } else {
            echo "Error: " . $SQL . "<br/>" . $conn->error;
            return false;
        }
    }

    //delete
    public function delete()
    {
        $id = $_POST["product_code"];
        $connection = new Connection();
        $conn = $connection->connect();
        $sql = "DELETE FROM product WHERE code =". $id;
    }

}

?>
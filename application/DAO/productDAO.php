<?php
namespace application\DAO;

use application\models\Product;

class ProductDAO
{
    // Create
    public function save($product)
    {
        $connection = new Connection();
        $conn = $connection->connect();

        $name = $product->getName();
        $brand = $product->getBrand();
        $price = $product->getPrice();

        $SQL = "INSERT INTO products (name, brand, price) VALUES (?, ?, ?)";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("ssd", $name, $brand, $price);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    // Read
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

        $SQL = "SELECT * FROM products WHERE code = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $row = $result->fetch_assoc();

        $product = new Product($row["name"], $row["brand"], $row["price"]);
        $product->setCode($row["code"]);

        return $product;
    }

    // Update
    public function update($product)
    {
        $connection = new Connection();
        $conn = $connection->connect();

        $code = $product->getCode();
        $name = $product->getName();
        $brand = $product->getBrand();
        $price = $product->getPrice();

        $SQL = "UPDATE products SET name = ?, brand = ?, price = ? WHERE code = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("ssdi", $name, $brand, $price, $code);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    // Delete
    public function delete($id)
    {
        $connection = new Connection();
        $conn = $connection->connect();

        $SQL = "DELETE FROM products WHERE code = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }
}
?>
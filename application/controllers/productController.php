<?php
use application\models\product;
use application\DAO\ProductDAO;
use application\core\controller;

class productController extends controller
{
    public function index()
    {
        $productDAO = new ProductDAO();
        $products = $productDAO->getAll();
        $this->view('product/index', ["products" => $products]);
    }

    public function register()
    {
        $this->view("product/register");
    }

    public function submit()
    {   
        $name = $_POST["product_name"];
        $brand = $_POST["product_brand"];
        $price = $_POST["product_price"];
        $product = new product($name, $brand, $price);

        $productDAO = new ProductDAO();
        $productDAO->save($product);

        $this->view("product/register");
        header("Location: /product/index");
    }


    public function startUpdate($code)
    {
        $productDAO = new ProductDAO();
        $product = $productDAO->getProductById($code);

        $this->view("product/update", ["product" => $product]);
    }
    public function submitUpdate()
    {
        $code = $_POST["product_code"];
        $name = $_POST["product_name"];
        $brand = $_POST["product_brand"];
        $price = $_POST["product_price"];
        $product = new product($name, $brand, $price);
        $product->setCode($code);

        $productDAO = new ProductDAO();
        $productDAO->update($product);

        $this->view("product/update", ["product" => $product]);
        header("Location: /product/index");
    }
    public function delete()
{
    $code = $_POST["productCode"];
    $productDAO = new ProductDAO();
    $productDAO->delete($code);

    $this->view("product/index");
    header("Location: /product/index");
    exit();
}
}

?>
<?php
use application\models\product;
use application\DAO\ProductDAO;
use application\core\controller;

class productController extends controller
{
    public function index()
    {
        $this->view('product/index');
    }

    public function register(){
        $this->view("product/register");
    }

    public function submit(){
        $name = $_POST["product_name"];
        $brand = $_POST["product_brand"];
        $price = $_POST["product_price"];
        $product = new product($name,$brand,$price);

        $productDAO = new ProductDAO();
        $productDAO->save($product);

        $this->view("product/register");
        }
}
?>
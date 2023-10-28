<?php
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
        $seller = $_POST["product_seller"];
        $price = $_POST["product_price"];
        $score = $_POST["product_review"];
        $desc = $_POST["product_desc"];
        print_r($name);
    }
}
?>
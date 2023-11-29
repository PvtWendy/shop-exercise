<?php
use application\models\product;
use application\DAO\ProductDAO;
use application\core\controller;

class homeController extends controller
{
    public function index()
    {
        $productDAO = new ProductDAO();
        $products = $productDAO->getAll();
        $this->view('home/index', ["products" => $products]);
    }
}
?>
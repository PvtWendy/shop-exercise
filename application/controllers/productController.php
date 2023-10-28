<?php
use application\core\controller;

class productController extends controller
{
    public function index()
    {
        $this->view('product/index');
    }
}
?>
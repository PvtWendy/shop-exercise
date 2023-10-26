<?php
use application\core\controller;

class ProdutoController extends controller
{
    public function index()
    {
        $this->view('produto/index');
    }
}
?>
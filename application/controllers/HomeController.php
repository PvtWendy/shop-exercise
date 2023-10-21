<?php
use application\core\controller;

class HomeController extends controller
{
    public function index()
    {
        $this->view('home/index');
    }
}
?>
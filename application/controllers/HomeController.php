<?php
use application\core\controller;

class homeController extends controller
{
    public function index()
    {
        $this->view('home/index');
    }
}
?>
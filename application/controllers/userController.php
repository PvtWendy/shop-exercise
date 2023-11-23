<?php
use application\core\controller;

class userController extends controller
{
    public function index()
    {
        $this->view('user/index');
    }

    public function signup()
    {
        $this->view("user/signup");
    }
    
    public function login()
    {
        $this->view("user/login");
    }
}

?>
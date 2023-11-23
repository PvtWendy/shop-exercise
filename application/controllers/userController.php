<?php
use application\models\user;
use application\core\controller;
use application\DAO\UserDAO;
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

    public function sendSignup(){
        $name = $_POST["user_name"];
        $password = $_POST["user_password"];
        $confirmation = $_POST["user_confirmation"];
        $number = $_POST["user_number"];
        $address = $_POST["user_address"];



        if ($password === $confirmation) {
            $user = new user($name, $number,$address,$password);

            $userDAO = new UserDAO();
            $userDAO->signup($user);
    
            $this->view("user/index");    
        }else{
            echo("AAAAAAAAAAAA");
        }
        
    }
    
    public function login()
    {
        $this->view("user/login");
    }
}

?>
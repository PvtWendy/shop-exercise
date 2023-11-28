<?php

use application\models\User;
use application\core\Controller;
use application\DAO\UserDAO;

class UserController extends Controller
{
    public function index()
    {
        $this->view('user/index');
    }

    public function signup()
    {
        $this->view("user/signup");
    }

    public function sendSignup()
    {
        $name = $_POST["user_name"];
        $password = $_POST["user_password"];
        $confirmation = $_POST["user_confirmation"];
        $number = $_POST["user_number"];
        $address = $_POST["user_address"];

        if ($password === $confirmation) {
            $user = new User($name, $number, $address, $password);

            $userDAO = new UserDAO();
            $userDAO->signup($user);

            header("Location: /user/login");
            exit();
        } else {
            echo "Passwords do not match!";
        }
    }

    public function login()
    {
        $this->view("user/login");
    }

    public function sendLogin()
    {
        $name = $_POST["user_name"];
        $password = $_POST["user_password"];

        $userDAO = new UserDAO();
        $loggedIn = $userDAO->login($name, $password);

        if ($loggedIn) {
            header("Location: /home/index");
            exit();
        } else {
            echo "Login failed!";
        }
    }

    public function update()
    {
        $userDAO = new UserDAO();
        $user = $userDAO->getById($_SESSION['user_id']);
        $this->view("user/update", ["user" => $user]);
    }

    public function submitUpdate()
    {
        $code = $_POST["user_code"];
        $name = $_POST["user_name"];
        $number = $_POST["user_number"];
        $address = $_POST["user_address"];
        $oldPassword = $_POST["old_password"]; // Assuming you have a field for old password in your form
        $newPassword = $_POST["user_password"];
    
        $userDAO = new UserDAO();
        $user = $userDAO->getById($code);
    
        if ($user && password_verify($oldPassword, $user->getPassword())) {
            $user->setName($name);
            $user->setNumber($number);
            $user->setAddress($address);
            $user->setPassword($newPassword);
    
            if ($userDAO->edit($user)) {
                echo "User updated successfully!";
                $this->view("user/index");
            } else {
                echo "Error updating user.";
            }
        } else {
            echo "Old password does not match.";
        }
    }
    public function delete()
    {
        $userDAO = new UserDAO();
        $userDAO->delete();

        header("Location: /home/index");
        exit();
    }
}

?>

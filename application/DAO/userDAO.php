<?php
namespace application\DAO;

use application\models\User;

class UserDAO
{
    //Create
    public function signup($user)
    {
        $connection = new Connection();
        $conn = $connection->connect();

        $name = $user->getName();
        $number = $user->getNumber();
        $address = $user->getAddress();
        $password = $user->getPassword();

        $SQL = "INSERT INTO users (name,number,address,password) VALUES ('$name', '$number', '$address', '$password' )";
        if ($conn->query($SQL) === true) {
            return true;
        } else {
            echo "Error: " . $SQL . "<br/>" . $conn->error;
            return false;
        }

    }
}

?>
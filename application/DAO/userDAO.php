<?php
namespace application\DAO;

use application\models\User;

class UserDAO
{
    // Create
    public function signup($user)
    {
        $connection = new Connection();
        $conn = $connection->connect();

        $name = $user->getName();
        $number = $user->getNumber();
        $address = $user->getAddress();
        $password = $user->getPassword(); // Assuming the password is plain text

        $SQL = "INSERT INTO users (name, number, address, password) VALUES (?, ?, ?, ?)";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("ssss", $name, $number, $address, $password);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    // Get user by ID
    public function getById($id)
    {
        $connection = new Connection();
        $conn = $connection->connect();

        $SQL = "SELECT * FROM users WHERE id = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $id);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user) {
            return new User($user["name"], $user["number"], $user["address"], $user["password"]);
        } else {
            return null; // User not found
        }
    }
    // Login
    public function login($name, $password)
    {
        $connection = new Connection();
        $conn = $connection->connect();

        $SQL = "SELECT * FROM users WHERE name = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("s", $name);
        $stmt->execute();

        $result = $stmt->get_result();
        $user = $result->fetch_assoc();

        if ($user && $password === $user["password"]) {
            $_SESSION['user_id'] = $user['code'];
            $_SESSION['user_name'] = $user['name'];
            
            return true;
        } else {
            return false;
        }
    }

    // Update
    public function edit($user)
    {
        $connection = new Connection();
        $conn = $connection->connect();

        $id = $_SESSION['user_id'];
        $name = $user->getName();
        $number = $user->getNumber();
        $address = $user->getAddress();

        $SQL = "UPDATE users SET name = ?, number = ?, address = ? WHERE id = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("sssi", $name, $number, $address, $id);

        if ($stmt->execute()) {
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }

    // Delete
    public function delete()
    {
        $connection = new Connection();
        $conn = $connection->connect();

        $id = $_SESSION['user_id'];

        $SQL = "DELETE FROM users WHERE id = ?";
        $stmt = $conn->prepare($SQL);
        $stmt->bind_param("i", $id);

        if ($stmt->execute()) {
            session_unset();
            session_destroy();
            return true;
        } else {
            echo "Error: " . $stmt->error;
            return false;
        }
    }
}
?>
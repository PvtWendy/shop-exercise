<?php 
namespace application\models;
class User {
    private $code;
    private $name;
    private $number;
    private $address;
    private $password;

    public function __construct($name, $number, $address, $password){
        $this->name = $name;
        $this->number = $number;
        $this->address = $address;
        $this->password = $password;
    }

    // Getter for $code
    public function getCode() {
        return $this->code;
    }

    // Setter for $code
    public function setCode($code) {
        $this->code = $code;
    }

    // Getter for $name
    public function getName() {
        return $this->name;
    }

    // Setter for $name
    public function setName($name) {
        $this->name = $name;
    }

    // Getter for $number
    public function getNumber() {
        return $this->number;
    }

    // Setter for $number
    public function setNumber($number) {
        $this->number = $number;
    }

    // Getter for $address
    public function getAddress() {
        return $this->address;
    }

    // Setter for $address
    public function setAddress($address) {
        $this->address = $address;
    }

    // Getter for $password
    public function getPassword() {
        return $this->password;
    }

    // Setter for $password
    public function setPassword($password) {
        $this->password = $password;
    }
}


?>
<?php

namespace application\models;

class Product
{
    private $code;
    private $name;
    private $brand;
    private $price;
    private $file_location;

    public function __construct($name, $brand, $price)
    {
        $this->name = $name;
        $this->brand = $brand;
        $this->price = $price;
    }

    public function setCode($code)
    {
        $this->code = $code;
    }

    public function getCode()
    {
        return $this->code;
    }

    public function getName()
    {
        return $this->name;
    }

    public function setName($name)
    {
        $this->name = $name;
    }

    public function getBrand()
    {
        return $this->brand;
    }

    public function setBrand($brand)
    {
        $this->brand = $brand;
    }

    public function getPrice()
    {
        return $this->price;
    }

    public function setPrice($price)
    {
        $this->price = $price;
    }

    public function getFileLocation()
    {
        return $this->file_location;
    }

    public function setFileLocation($file_location)
    {
        $this->file_location = $file_location;
    }
}

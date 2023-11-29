<?php
use application\models\product;
use application\DAO\ProductDAO;
use application\core\controller;

class productController extends controller
{
    public function index()
    {
        $productDAO = new ProductDAO();
        $products = $productDAO->getAll();
        $this->view('product/index', ["products" => $products]);
    }

    public function register()
    {
        $this->view("product/register");
    }

    public function submit()
    {
        $name = $_POST["product_name"];
        $brand = $_POST["product_brand"];
        $price = $_POST["product_price"];
        $product = new product($name, $brand, $price);

        $imageLocation = $this->uploadImage();

        if ($imageLocation !== null) {
            $product->setFileLocation($imageLocation);
        }

        $productDAO = new ProductDAO();
        $productDAO->save($product);

        $this->view("product/register");
        header("Location: /product/index");
    }



    public function startUpdate($code)
    {
        $productDAO = new ProductDAO();
        $product = $productDAO->getProductById($code);

        $product->setFileLocation($product->getFileLocation());

        $this->view("product/update", ["product" => $product]);
    }

    public function submitUpdate()
    {
        $code = $_POST["product_code"];
        $name = $_POST["product_name"];
        $brand = $_POST["product_brand"];
        $price = $_POST["product_price"];

        $imageLocation = $this->uploadImage();
        if ($imageLocation === null) {
            return;
        }

        $product = new product($name, $brand, $price);
        $product->setCode($code);
        $product->setFileLocation($imageLocation);

        $productDAO = new ProductDAO();
        $productDAO->update($product);

        $updatedProduct = $productDAO->getProductById($code);

        $this->view("product/update", ["product" => $updatedProduct]);
        header("Location: /product/index");
    }
    public function delete()
    {
        $code = $_POST["productCode"];
        $productDAO = new ProductDAO();
        $productDAO->delete($code);

        $this->view("product/index");
        header("Location: /product/index");
        exit();
    }
    private function uploadImage()
    {
        $target_dir = $_SERVER["DOCUMENT_ROOT"] . "/assets/";
        $target_file = $target_dir . basename($_FILES["product_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (getimagesize($_FILES["product_image"]["tmp_name"]) === false) {
            echo "Sorry, your file is not an image.";
            return null;
        }

        if ($_FILES["product_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            return null;
        }

        $allowedFormats = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            return null;
        }

        if (move_uploaded_file($_FILES["product_image"]["tmp_name"], $target_file)) {
            // Return the URL path to the uploaded image
            return "/assets/" . basename($_FILES["product_image"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            return null;
        }
    }

    private function uploadUpdatedImage($currentFileLocation)
{
    if (!empty($_FILES["updated_product_image"]["name"])) {
        $target_dir = $_SERVER["DOCUMENT_ROOT"] . "/assets/";
        $target_file = $target_dir . basename($_FILES["updated_product_image"]["name"]);
        $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

        if (getimagesize($_FILES["updated_product_image"]["tmp_name"]) === false) {
            echo "Sorry, your file is not an image.";
            return null;
        }

        if ($_FILES["updated_product_image"]["size"] > 500000) {
            echo "Sorry, your file is too large.";
            return null;
        }

        $allowedFormats = ["jpg", "jpeg", "png", "gif"];
        if (!in_array($imageFileType, $allowedFormats)) {
            echo "Sorry, only JPG, JPEG, PNG, and GIF files are allowed.";
            return null;
        }

        if (move_uploaded_file($_FILES["updated_product_image"]["tmp_name"], $target_file)) {
            return "/assets/" . basename($_FILES["updated_product_image"]["name"]);
        } else {
            echo "Sorry, there was an error uploading your file.";
            return null;
        }
    } else {
        return $currentFileLocation;
    }
}

}

?>
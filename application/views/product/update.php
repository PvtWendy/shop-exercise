<?php
$code = $data["product"]->getCode();
$name = $data["product"]->getName();
$brand = $data["product"]->getBrand();
$price = $data["product"]->getPrice();




?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <?php
    $componentDir = $_SERVER["DOCUMENT_ROOT"] . "/components/";
    include $componentDir . "menu.php"; ?>
    <form action="/product/submitUpdate" method="POST" class="productForm">
        <input type="hidden" name="product_code" value="<?= $code ?>">
        <label for="product_name">Name:</label>
        <input type="text" name="product_name" value="<?= $name ?>">
        <label for="product_brand">Brand:</label>
        <input type="text" name="product_brand" value="<?= $brand ?>">
        <label for="product_price">Price:</label>
        <input type="text" name="product_price" value="<?= $price ?>">
        <input type="submit" value="Submit" id="submitButton">
    </form>
</body>

</html>
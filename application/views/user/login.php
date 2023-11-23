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
    <form action="/product/submit" method="POST" class="productForm">
        <label for="user_name">Name:</label>
        <input type="text" name="user_name">
        <label for="user_password">Password:</label>
        <input type="text" name="user_password  ">
        <label for="user_number">Phone Number:</label>
        <input type="text" name="user_number">
        <label for="user_address">Address:</label>
        <input type="text" name="user_address">
        <input type="submit" value="Submit" id="submitButton">
    </form>
</body>

</html>
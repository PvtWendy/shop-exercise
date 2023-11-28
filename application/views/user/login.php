<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
</head>

<body>
    <?php
    $componentDir = $_SERVER["DOCUMENT_ROOT"] . "/components/";
    include $componentDir . "menu.php"; ?>
    <form action="/user/sendLogin" method="POST" class="productForm">
        <label for="user_name">Name:</label>
        <input type="text" name="user_name">
        <label for="user_password">Password:</label>
        <input type="password" name="user_password">
        <input type="submit" value="Submit" id="submitButton">
    </form>
</body>

</html>
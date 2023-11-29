<?php
$userCode = $_SESSION['user_id'];
$userName = $data["user"]->getName();
$userNumber = $data["user"]->getNumber();
$userAddress = $data["user"]->getAddress();
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Profile</title>
</head>

<body>
    <?php
    $componentDir = $_SERVER["DOCUMENT_ROOT"] . "/components/";
    include $componentDir . "menu.php";
    ?>

    <form action="/user/submitUpdate" method="POST" class="productForm">
        <label for="user_name">Name:</label>
        <input type="text" name="user_name" value="<?= $userName ?>">
        
        <label for="old_password">Old Password:</label>
        <input type="password" name="old_password">

        <label for="user_password">New Password:</label>
        <input type="password" name="user_password">
        
        <label for="user_confirmation">Confirm New Password:</label>
        <input type="password" name="user_confirmation">

        <label for="user_number">Phone Number:</label>
        <input type="text" name="user_number" value="<?= $userNumber ?>">
        
        <label for="user_address">Address:</label>
        <input type="text" name="user_address" value="<?= $userAddress ?>">

        <input type="hidden" name="user_code" value="<?= $userCode ?>">

        <input type="submit" value="Update" id="submitButton">
    </form>
</body>

</html>

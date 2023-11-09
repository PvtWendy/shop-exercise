<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
</head>

<body>
    <form action="/product/submit" method="POST">
        <label for="product_name">Name:</label>
        <input type="text" name="product_name">
        <label for="product_brand">Brand:</label>
        <input type="text" name="product_brand">
        <label for="product_price">Price:</label>
        <input type="text" name="product_price">
        <input type="submit" value="Submit">
    </form>
</body>

</html>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
</head>

<body>
    <?php
    $componentDir = $_SERVER["DOCUMENT_ROOT"] . "/components/";
    include $componentDir . "menu.php"; ?>
    <h1>
        Products
    </h1>
    <hr>
    <table class="productTables">
        <thead>
            <th>Code</th>
            <th>Name</th>
            <th>Brand</th>
            <th>Price</th>
        </thead>
        <tbody>
            <?php foreach ($data["products"] as $products) { ?>   
                <tr>
                    <td><?= $products->getCode()?></td>
                    <td><?= $products->getName()?></td>
                    <td><?= $products->getBrand()?></td>
                    <td><?= $products->getPrice()?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="/product/register">Add Product</a>

</body>

</html>
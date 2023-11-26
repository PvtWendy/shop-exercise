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
            <th>Action</th>
        </thead>
        <tbody>
            <?php foreach ($data["products"] as $products) { ?>
                <tr>
                    <td>
                        <?= $products->getCode() ?>
                    </td>
                    <td>
                        <?= $products->getName() ?>
                    </td>
                    <td>
                        <?= $products->getBrand() ?>
                    </td>
                    <td>
                        <?= $products->getPrice() ?>
                    </td>
                    <td>
                        <a href="/product/startUpdate/">Edit</a>
                        <form action="/product/delete" method="post">
                            <input type="hidden" name="productCode" value="<?= $products->getCode() ?>">
                            <input type="hidden" name="productName" value="<?= $products->getName() ?>">
                            <input type="hidden" name="productBrand" value="<?= $products->getBrand() ?>">
                            <button type="button" onclick="openDeleteDialog(this)">Delete</button>
                            <button type="submit" style="display: none;">Confirm Delete</button>
                        </form>

                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
    <a href="/product/register" class="button" id="productButton">Add Product</a>
    <dialog id="deleteDialog">
        <p id="deleteMessage"></p>
        <button onclick="confirmDelete()">Yes, delete</button>
        <button onclick="closeDeleteDialog()">Cancel</button>
    </dialog>

    <script>
        const deleteDialog = document.getElementById('deleteDialog');
        let currentForm;

        function openDeleteDialog(button) {
            currentForm = button.closest('form');
            const productName = currentForm.querySelector('input[name="productName"]').value;
            const productBrand = currentForm.querySelector('input[name="productBrand"]').value;

            document.getElementById('deleteMessage').innerText = `Are you sure you want to delete ${productName} by ${productBrand}?`;
            deleteDialog.showModal();
        }

        function closeDeleteDialog() {
            deleteDialog.close();
        }

        function confirmDelete() {
            currentForm.submit();
            closeDeleteDialog();
        }
    </script>
</body>

</html>
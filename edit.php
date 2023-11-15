
<?php
require './config/db.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    $result = mysqli_query($db_connect, "SELECT * FROM products WHERE id=$id");
    $product = mysqli_fetch_assoc($result);

    if (!$product) {
        header("Location: show.php");
        exit();
    }
} else {
    header("Location: show.php");
    exit();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $newName = $_POST['new_name'];
    $newPrice = $_POST['new_price'];

    $updateQuery = "UPDATE products SET name='$newName', price='$newPrice' WHERE id=$id";
    mysqli_query($db_connect, $updateQuery);

    header("Location: show.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Product</title>
</head>
<body>
    <h1>Edit Product</h1>

    <form method="POST" action="">
        <label for="new_name">New Product Name:</label>
        <input type="text" id="new_name" name="new_name" value="<?= $product['name']; ?>" required>

        <label for="new_price">New Price:</label>
        <input type="text" id="new_price" name="new_price" value="<?= $product['price']; ?>" required>

        <button type="submit">Update Product</button>
    </form>
</body>
</html>

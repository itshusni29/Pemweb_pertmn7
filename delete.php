

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
    // Delete the product from the database
    $deleteQuery = "DELETE FROM products WHERE id=$id";
    mysqli_query($db_connect, $deleteQuery);

    // Redirect to the product list after deleting
    header("Location: show.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Product</title>
</head>
<body>
    <h1>Delete Product</h1>

    <p>Are you sure you want to delete the product: <strong><?= $product['name']; ?></strong>?</p>

    <form method="POST" action="">
        <button type="submit">Delete Product</button>
    </form>
</body>
</html>

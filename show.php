<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Produk</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 20px;
        }

        h1 {
            text-align: center;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }

        th {
            background-color: #f2f2f2;
        }

        img {
            max-width: 100px;
            max-height: 100px;
        }

        .options {
            display: flex;
            justify-content: space-between;
        }

        .options a {
            padding: 5px 10px;
            text-decoration: none;
            color: #fff;
            border-radius: 5px;
        }

        .edit {
            background-color: #3498db;
        }

        .delete {
            background-color: #e74c3c;
        }
    </style>
</head>
<body>
    <h1>Data Produk</h1>
    <table>
        <thead>
            <tr>
                <th>#</th>
                <th>Nama Produk</th>
                <th>Harga</th>
                <th>Gambar Produk</th>
                <th>Opsi</th>
            </tr>
        </thead>
        <tbody>
            <?php
                require './config/db.php';

                $products = mysqli_query($db_connect, "SELECT * FROM products");
                $no = 1;

                while ($row = mysqli_fetch_assoc($products)) {
            ?>
                <tr>
                    <td><?= $no++; ?></td>
                    <td><?= $row['name']; ?></td>
                    <td>Rp <?= number_format($row['price'], 0, ',', '.'); ?></td>
                    <td>
                        <?php if (!empty($row['image'])) : ?>
                            <img src="<?= $row['image']; ?>" alt="Product Image">
                        <?php endif; ?>
                    </td>
                    <td class="options">
                        <a href="edit.php?id=<?= $row['id']; ?>" class="edit">Edit</a>
                        <a href="delete.php?id=<?= $row['id']; ?>" class="delete">Hapus</a>
                    </td>
                </tr>
            <?php } ?>
        </tbody>
    </table>
</body>
</html>

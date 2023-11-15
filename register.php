<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>

    <style>
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            color: #333;
        }

        form {
            max-width: 400px;
            margin: 0 auto;
            padding: 20px;
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        input {
            width: 100%;
            padding: 10px;
            margin-bottom: 10px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-color: #4CAF50;
            color: white;
            cursor: pointer;
        }

        input[type="submit"]:hover {
            background-color: #45a049;
        }

        .error-message {
            color: red;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Register</h1>
    <form action="./backend/register.php" method="post">
        <?php
        session_start();
        if (isset($_SESSION['error_message'])) {
            echo '<p class="error-message">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']);
        }
        ?>
        <input type="text" name="name" placeholder="Masukkan nama anda" required>
        <input type="email" name="email" placeholder="Masukkan email anda" required>
        <input type="password" name="password" placeholder="Masukkan password anda" required>
        <input type="password" name="confirm" placeholder="Masukkan konfirmasi password anda" required>
        <input type="submit" value="Register" name="submit">
    </form>
</body>
</html>

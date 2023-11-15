<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
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

        .success-message {
            color: green;
            margin-bottom: 10px;
        }
    </style>
</head>
<body>
    <h1>Login</h1>
    <?php
    session_start();
    if (isset($_SESSION['success_message'])) {
        echo '<p class="success-message">' . $_SESSION['success_message'] . '</p>';
        unset($_SESSION['success_message']);
    }
    ?>
    <form action="./backend/login.php" method="post">
        <input type="email" name="email" placeholder="Masukkan email anda">
        <input type="password" name="password" placeholder="Masukkan password anda">
        <input type="submit" value="Login" name="submit">
    </form>
</body>
</html>

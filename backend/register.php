<?php
session_start();
require './../config/db.php';

$error_message = ''; 

if (isset($_POST['submit'])) {

    global $db_connect;

    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm = $_POST['confirm'];

    if (strlen($password) < 6 || !preg_match('/\d/', $password)) {
        $error_message = "Password must be at least 6 characters long and contain at least one digit.";
    } elseif ($confirm != $password) {
        $error_message = "Password doesn't match the confirmation.";
    } else {

        $usedEmail = mysqli_query($db_connect, "SELECT email FROM users WHERE email = '$email'");
        if (mysqli_num_rows($usedEmail) > 0) {
            $error_message = "Email is already in use.";
        } else {
            $password = password_hash($password, PASSWORD_DEFAULT);
            $created_at = date('Y-m-d H:i:s', time());

            $users = mysqli_query($db_connect, "INSERT INTO users (name, email, password, created_at) VALUES
                                ('$name','$email','$password','$created_at')");

            if ($users) {
                $_SESSION['success_message'] = "Registration successful. You can now log in.";
                header("Location: ../index.php");
                exit();
            } else {
                $error_message = "Registration failed. Please try again.";
            }
        }
    }

    $_SESSION['error_message'] = $error_message;
    header("Location: ../register.php");
    exit();
}
?>

<?php

include "../../root/conn.php";

if(isset($_POST['add_user'])) {
    $id_user = $_POST['id_user'];
    $name = $_POST['name'];
    $email = $_POST['email'];
    $password = $_POST['password'];

    $password_hash = password_hash($password, PASSWORD_DEFAULT);

    if ($conn) {
        $add_user = mysqli_query($conn, "INSERT INTO user (name, email, password) VALUES ('$name', '$email', '$password_hash')");

        if ($add_user) {
            echo '<script>
            alert("Success! Please login '.$name.'");
            window.location.href = "login.php";
            </script>';
        } else {
            echo '<script>
            alert("Failed to create account!");
            window.location.href = "register.php";
            </script>';
        }
    }
}

if (!isset($_SESSION['login'])) {

} else {
    header('location: ../../page/index.php');
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index</title>
    <link rel="stylesheet" href="../../assets/css/regis-login.css" type="text/css">
    <style>
        .login-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .login-link a {
            color: #6930c3;
            text-decoration: none;
        }
    </style>
</head>
<body>
    <div class="form-container">
        <h2>Register</h2>
        <form class="user" method="post">
            <div class="form-group">
                <label for="name">Name</label>
                <input type="text" id="name" name="name" required>
            </div>
            <div class="form-group">
                <label for="email">Email</label>
                <input type="email" id="email" name="email" required>
            </div>
            <div class="form-group">
                <div class="password-container">
                    <label for="password">Password</label>
                    <input type="password" id="password" name="password" required>
                    <span class="password-toggle" id="togglePassword">
                        <img src="../../assets/images/eye-slash.png" style="width: 17px; height: auto; margin-top: 5px">
                    </span>
                </div>
            </div>
            <button type="submit" name="add_user">Register</button>
            <input type="hidden" name="id_user" value="<?=$id_user;?>">
        </form>
        <div class="login-link">
            Have an account? <a href="login.php">Login!</a>
        </div>
    </div>
    <script src="../../assets/js/regis-login.js"></script>
</body>
</html>
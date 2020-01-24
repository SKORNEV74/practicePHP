<!doctype html>
<html xml:lang="en" lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Login</title>
</head>
<body>
<div class="container">
    <form class="form-signin" action="user.php" method="POST">
        <h2>Login</h2>
        <input type="text" name="username" class="form-control btn-lg" placeholder="Username" required>
        <input type="password" name="password" class="form-control btn-lg" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" type="submit">Login</button>
        <a href="index.php" class="btn btn-lg btn-primary btn-block">Registration</a>
    </form>
</div>

<?php
//session_start();
require('connect.php');

//public static

if (isset($_POST['username']) and isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];



    $query = "SELECT * FROM users WHERE username='$username' and password='$password'";
    $result = mysqli_query($connection, $query) or die(mysqli_error($connection));
    $count = mysqli_num_rows($result);

    if ($count == 1) {
        $_SESSION['username'] = $username;
    } else {
        $fmsg = "Ошибка";
    }
}

//if (isset($_SESSION['username'])) {
//    $username = $_SESSION['username'];
//    echo "Hello, " . $username . "! ";
//    echo "Вы вошли. ";
//    echo "<a href='logout.php' class='btn btn-lg btn-primary' > Logout </a>";
//}
?>

</body>
</html>
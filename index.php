<!doctype html>
<html xml:lang="en" lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>Registration</title>
</head>
<body>
    <div class="container">

        <?php
        require('connect.php');

        if (isset($_POST['username']) and isset($_POST['password'])) {
            $username = $_POST['username'];
            $email = $_POST['email'];
            $password = $_POST['password'];

            $query = "INSERT INTO users (username, password, email) VALUES ('$username', '$password', '$email')";
            $result = mysqli_query($connection, $query);

            if ($result) {
                $smsg = "Регистрация прошла успешно";
            } else {
                $fsmsg = "Ошибка";
            }
        }
        ?>

        <form class="form-signin" method="POST">
            <h2>Registration</h2>
            <?php if(isset($smsg)){ ?><div class="alert alert-success btn-lg" role="alert"> <?php echo $smsg; ?> </div><?php }?>
            <?php if(isset($fsmsg)){ ?><div class="alert alert-danger btn-lg" role="alert"> <?php echo $fsmsg; ?> </div><?php }?>
            <input type="text" name="username" class="form-control btn-lg" placeholder="Username" required>
            <input type="email" name="email" class="form-control btn-lg" placeholder="Email" required>
            <input type="password" name="password" class="form-control btn-lg" placeholder="Password" required>
            <button class="btn btn-lg btn-primary btn-block" type="submit">Register</button>
            <a href="login.php" class="btn btn-lg btn-primary btn-block">Login</a>
        </form>
    </div>
</body>
</html>
<!doctype html>
<html xml:lang="en" lang="ru">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="vendor/twbs/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="style.css">
    <title>User</title>
</head>
<body>

<?php
require('connect.php');

$username = $_POST['username'];

// Вывод строк с названием книги и именем автора
$query = mysqli_query($connection, "SELECT bookname, author FROM userdatainplan WHERE username = '$username'");

?>

<div class="container">
    <div class="row align-content-center">
        <div class="col-auto">
            <h1><?php echo $username; ?></h1>
        </div>
        <div class="col"></div>
        <div class="col-auto">
            <a href='logout.php' class='btn btn-lg btn-primary' > Logout </a>
        </div>
    </div>
    <div class="row align-content-center">
        <div class="col">
            <button class="btn btn-lg btn-block btn-light" onclick="plan">В планах</button>
        </div>
        <div class="col">
            <button class="btn btn-lg btn-block btn-light" onclick="buy">Куплено</button>
        </div>
        <div class="col">
            <button class="btn btn-lg btn-block btn-light" onclick="readd">Прочитано</button>
        </div>
    </div>

    <form action="redirection.php" method="POST">
        <div class="row align-content-center">
            <div class="col">
                <input type="text" name="new-bookname" class="form-control btn-lg" placeholder="Название книги" required>
            </div>
            <div class="col">
                <input type="text" name="new-author" class="form-control btn-lg" placeholder="Имя автора" required>
            </div>
            <div class="col-2">
                <button class="btn btn-lg btn-primary btn-block" onclick="addd" type="submit">Add</button>
            </div>
        </div>
    </form>

    <?php
    if (isset($_POST['new-bookname']) and isset($_POST['new-author'])) {
        $newBookname = $_POST['new-bookname'];
        $newAuthor = $_POST['new-author'];

        $insertQuery = "INSERT INTO userdatainplan (username, bookname, author) VaLUES ('$username', '$newBookname', '$newAuthor')";
        $insertResult = mysqli_query($connection, $insertQuery) or die(mysqli_error($connection));
//        $count = mysqli_num_rows($insertResult);
//
//        function console_log($check){
//            if($check == 1){
//                echo("<script>console.log('Success');</script>");
//            } else {
//                echo("<script>console.log('Fault');</script>");
//            }
//        }
//
//        console_log($count);
    }
    ?>

    <?php while ($row = mysqli_fetch_array($query)) { ?>
        <div class="row align-content-center table-bordered">
            <div class="col btn-lg"><?php echo $row['bookname']; ?></div>
            <div class="col btn-lg"><?php echo $row['author']; ?></div>
            <div class="col-2">
                <button class="btn btn-lg btn-primary btn-block" type="">Delete</button>
            </div>
        </div>
    <?php } ?>

</div>

</body>
</html>
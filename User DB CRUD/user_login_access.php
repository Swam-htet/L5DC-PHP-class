<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Demo</title>


    <!-- Optional theme -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

    <?php
    // config
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "userdb";
    $tbName = "user";

    //connection
    $connection = mysqli_connect($host, $username, $password, $dbname);

    $UserName = $_POST['userName'];
    $password = $_POST['password'];

    $sql = "select * from $tbName where userName='$UserName' and password='$password'";

    $result = mysqli_query($connection, $sql);
    $no_of_row = mysqli_num_rows($result);

    if ($no_of_row == 0) {
        echo "<div class='alert alert-danger m-5'> Login failed.</div>";
    } else {
        echo "<div class='alert alert-success m-5'> Login Successful. </div>";
    }

    ?>

</body>
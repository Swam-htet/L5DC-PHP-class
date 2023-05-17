<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create Database</title>


    <!-- Optional theme -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <?php

    $host = "localhost";
    $username = "root";
    $password = "";
    $dbName = "userdb";

    // db connection
    $connection = mysqli_connect($host, $username, $password);

    // sql query in string
    $sql = "create database $dbName";

    // query passed or faile
    if (mysqli_query($connection, $sql)) {
        echo "<div class='alert alert-success m-5'> User database is created</div>";
    } else {
        echo "<div class='alert alert-danger m-5'> Error creating database</div>";
    }

    ?>


</body>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
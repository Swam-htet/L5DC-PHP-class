<?php include "./component/header.php" ?>

<?php
include "./config/config.php";

$tbName = "User";

if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}

// sql query in string
$sql = "CREATE TABLE $tbName (
    id INT PRIMARY KEY AUTO_INCREMENT,
    firstName VARCHAR(255) NOT NULL,
    lastName VARCHAR(255) NOT NULL,
    userName VARCHAR(255) NOT NULL UNIQUE,
    password VARCHAR(255) NOT NULL,
    phone VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    country VARCHAR(255) NOT NULL,
    remark TEXT NULL)";

// query passed or faile
if ($connection->query($sql)) {
    echo "<div class='alert alert-success m-5'> User Table is created</div>";
} else {
    echo "<div class='alert alert-danger m-5'> Error creating User table : " . $connection->error . " </div>";
}

?>

<?php include "./component/footer.php" ?>
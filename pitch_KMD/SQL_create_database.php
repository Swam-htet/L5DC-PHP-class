
<?php include "./component/header.php"; ?>

<?php
include "./config/config.php";


// sql query in string
$sql = "create database $dbname";

// query passed or faile
if (mysqli_query($connection, $sql)) {
    echo "Database is created.";
} else {
    echo "Error";
}

?>
<?php include("./component/footer.php") ?>

<?php include "./component/header.php"; ?>

<?php
include "./config/config.php";


//connection
$connection = new mysqli($host, $username, $password);

if($connection->connect_error){
    die("Connection Error : ".$connection->connect_error);
}


// sql query in string
$sql = "CREATE DATABASE $dbName";

// query passed or faile
if ($connection->query($sql)) {
    echo "Database is created.";
} else {
    echo "Error : ".$connection->error;
}

?>
<?php include("./component/footer.php") ?>
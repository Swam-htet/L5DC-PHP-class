<?php

include "./config/config.php";
$connection = new mysqli($host,$username,$password);



if ($connection->connect_error) {
    die("Connection failed: " . $connection->connect_error);
}

$databaseName = "userDB";  
$sql = "CREATE DATABASE $databaseName";

if ($connection->query($sql) === TRUE) {
    echo "Database created successfully";
} else {
    echo "Error creating database: " . $connection->error;
}

$connection->close();
?>
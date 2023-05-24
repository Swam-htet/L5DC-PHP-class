<?php include "./component/header.php"; ?>
<?php

include "./config/config.php";

//connection
$connection = new mysqli($host, $username, $password,$dbName);

if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}

$tbName = "pitchINFO";

$sql = "CREATE TABLE $tbName
            (id INT PRIMARY KEY auto_increment, 
            pname varchar(255) not null, 
            location text not null,
            address varchar(255) not null, 
            photo varchar(255) not null,
            general varchar(255) not null, 
            country varchar(255) not null, 
            remark text null)";

// 
if ($connection->query($sql)) {
    echo "Table is created.";
} else {
    echo "Error : " . $connection->error;
}

?>
<?php include "./component/footer.php" ?>
<?php include "./component/header.php" ?>
<?php

include "./config/config.php";
$connection = new mysqli($host,$username,$password,$dbName);


if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}
$tbName = "userINFO";

// query in string
$sql = "INSERT INTO $tbName 
        (firstName, lastName, userName, password, phone, email, country, remark) 
        VALUES ('Admin', 'Admin', 'Admin', '12345', '09300400500', 'admin12345@gmail.com', 'Myanmar', 'This is remark of Admin')";


// query
if ($connection->query($sql)) {
    echo "Inserting Data is successful.";
} else {
    echo "Error in inserting data to Table." . $connection->error;
}

?>
<?php include "./component/footer.php" ?>
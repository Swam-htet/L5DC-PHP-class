<?php include "./component/header.php" ?>
<?php

include "./config/config.php";

if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}
$tbName = "user";

// query in string
$sql = "INSERT INTO $tbName 
        (firstName, lastName, userName, password, phone, email, country, remark) 
        VALUES ('Swam', 'Htet', 'alphar', '123456', '09400500600', 'swamhtet129@gmail.com', 'Myanmar', 'This is remark of Swam Htet')";


// query
if ($connection->query($sql)) {
    echo "<div class='alert alert-success m-5'> Inserting Data is successful. </div>";
} else {
    echo "<div class='alert alert-danger m-5'> Error in inserting data to Table." . $connection->error . " </div>";
}

?>
<?php include "./component/footer.php" ?>
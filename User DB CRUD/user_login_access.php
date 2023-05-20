<?php include "./component/header.php" ?>

<?php

include "./config/config.php";

$tbName = "User";

if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}

$data = json_decode(json_encode($_POST), false);

$sql = "SELECT * FROM $tbName WHERE userName='$data->userName' AND password='$data->password'";

$result = $connection->query($sql);
if($result){

    $no_of_row = $result->num_rows;

    if ($no_of_row == 0) {
        echo "<div class='alert alert-danger m-5'> Login failed.</div>";
    } else {
        echo "<div class='alert alert-success m-5'> Login Successful. </div>";
    }
    
}
else{
    echo "<div class='alert alert-danger m-5'> User registration failed : " . $connection->error . "</div>";
}
?>

<?php include "./component/footer.php" ?>
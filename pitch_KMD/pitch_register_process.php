<?php

session_start();
$session_user = $_SESSION['username'];
include "./component/header.php";

if ($session_user == 'admin') {

    include("./config/config.php");
    $connection = new mysqli($host, $username, $password, $dbName);
    $tbName = "pitchINFO";


    if ($connection->connect_error) {
        $error_message = $connection->connect_error;
        error_log("Connection error >> $error_message");
    }

    $data = json_decode(json_encode($_POST), false);

    // duplicated check 
    $check = "SELECT * FROM $tbName WHERE pname = '$data->pname'";

    // file name
    $file = $_FILES['photo']['name'];

    // assign file path
    $path = "photo/" . $file;


    // file IO 
    $copy = copy($_FILES['photo']['tmp_name'], $path);

    // copy successful 
    if ($copy) {
        echo "Photo is copied";
    }

    // duplicated check query 
    $result = $connection->query($check);

    // no duplication 
    if ($result->num_rows == 0) {

        // insert 
        $sql = "INSERT INTO $tbName (pname,location,address,photo,general,country,remark) 
    VALUES ('$data->pname','$data->location','$data->address','$path','$data->general','$data->country','$data->remark');";

        if ($connection->query($sql) == true) {
            echo "Registration successful";
        } else {
            echo "Registration failed : " . $connection->error;
        }
    } else {
        echo "Pitch is already existed.";
    }
} else {
    echo "Admin User only";
}
?>
<?php include "./component/footer.php" ?>


<?php
    session_start();
    $session_user = $_SESSION['username'];

    include './component/header.php';

if($session_user=='admin'){

    include "./config/config.php";
    $connection = new mysqli($host, $username, $password, $dbName);
    if ($connection->connect_error) {
        die("Connection Error : " . $connection->connect_error);
    }
    
    
    
    $tbName = "pitchINFO";
    $data = json_decode(json_encode($_POST), false);
    var_dump($data);
    
    $sql = "UPDATE $tbName SET pname= '$data->pname',location='$data->location',address='$data->address',country='$data->country',general='$data->general' WHERE id=$data->id";   //value
    
    if ($connection->query($sql)) {
        echo "Successfully Updated<br>";
    } else {
        echo "Error : " . $connection->error;
    }
    
    include './component/footer.php';
}
else{
    echo "Admin User only";
}

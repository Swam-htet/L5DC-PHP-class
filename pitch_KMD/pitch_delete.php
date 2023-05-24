
<?php
session_start();
include './component/header.php';

include "./config/config.php";

// check username
if (isset($_SESSION['username'])) {
    $session_user = $_SESSION['username'];
}
$id = $_GET['id'];
$tbName = "pitchINFO";



$connection = new mysqli($host, $username, $password, $dbName);


// check connection 
if ($connection->connect_error) {
    $error_message = $connection->connect_error;
    error_log("Connection error >> $error_message");
}



if ($session_user == "admin") {
    $sql = "DELETE FROM $tbName WHERE id = '$id'";

    if ($connection->query($sql)) {
        echo "$id is deleted";
    } else {
        echo "Error : " . $connection->error;
    }
}
else{
    echo "Admin User Only";
}
?>

<?php include './component/footer.php' ?>

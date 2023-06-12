<?php
session_start();

// check username
if (isset($_SESSION['session_user'])) {
    $session_user = $_SESSION['session_user'];
}

// get camp id 
$id = $_GET['id'];

$tbName = "camp";

// connection and connection check 
include "./config/config.php";
$connection = new mysqli($hot, $username, $password, $dbName);
if ($connection->connect_error) {
    $error_message = $connection->connect_error;
    error_log("Connection error >> $error_message");
}


// component import 
include_once "./component/header.php";
include_once './component/navbar.php';

?>

<?php

// list for navbar 
$list = array(
    array('name' => 'Home', 'link' => "index.php"),
    array('name' => 'Information', 'link' => "information.php"),


);

// current tab
$current_tab = "Delete";

// header
header_function($current_tab);

// navbar 
navbar_function($list);

?>

<?php

// session user check 
if ($session_user == "Admin") {
    if (isset($id)) {

        $sql = "DELETE FROM $tbName WHERE id = '$id'";
        $result = $connection->query($sql);
        if ($result->num_rows === 1) {
            echo "$id is deleted";
        } else {
            var_dump($connection->error);
        }
    } else {
        echo "No ID";
    }
} else {
    echo "Admin Only";
}

?>

<?php
// footer 
include_once "./component/footer.php";
?>
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
navbar_function($session_user, $list);

?>

<?php

// session user check 
if ($session_user == "Admin") {
    if (isset($id)) {
        $search_query = "SELECT * FROM $tbName WHERE id='$id'";
        $search_result = $connection->query($search_query);
        if ($search_result->num_rows > 0) {
            $sql = "DELETE FROM $tbName WHERE id = '$id'";
            $result = $connection->query($sql);

            if ($result) {
                echo "<div class='alert alert-success'>
                            <h3>Camp-$id  is deleted.</h3>
                    </div>";
            } else {
                echo "<div class='alert alert-danger'>
                        <h3>Connection Error : $connection->error</h3>
                    </div>";
            }
        } else {
            echo "No camp";
        }
    } else {
        echo "<div class='alert alert-warning'>
                <h3>No such ID</h3>
            </div>";
    }
} else {
    echo "<div class='alert alert-danger'>
                <h3>Admin Only</h3>
        </div>";
}

?>

<?php
// footer 
include_once "./component/footer.php";
?>
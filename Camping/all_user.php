<?php
session_start();

$user_id = $_SESSION['session_id'];
if (isset($_SESSION['session_user'])) {
    $session_user = $_SESSION['session_user'];
}


// connection and connection check  
include "./config/config.php";
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}

$tbName = "user";

// component import 
include_once "./component/header.php";
include_once './component/navbar.php';
include_once './component/card.php';
include_once "./component/here.php";
include_once "./component/viewCounter.php";

?>

<?php

// list for navbar 
$list = array(
    array('name' => 'Home', 'link' => "index.php"),
    array('name' => 'Information', 'link' => "information.php"),

);

// current tab 
$current_tab = "Users";

// header
header_function($current_tab);

// navbar 
navbar_function($session_user, $list);

?>

<?php
if ($session_user === "Admin") {
    echo "<div class = 'container'>";


    $sql = "SELECT * from $tbName where id > 1 order by id";

    $result = $connection->query($sql);

    if ($result) {

        $reviews = $result->num_rows;
        echo "<div>";

        if ($result && $reviews > 0) {
            while ($item = $result->fetch_assoc()) {
                $item = json_decode(json_encode($item), false);
                User_card($item);
            }
        } else {
            echo "<div class='alert alert-warning'>No User found</div>";
        }
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger'>Error : $connection->error </div>";
    }
    echo "</div>";
} else {
    echo "Admin Only Page";
}
?>

<?php
view_counter($connection);

// footer 
Here($current_tab);
include_once "./component/footer.php";
?>
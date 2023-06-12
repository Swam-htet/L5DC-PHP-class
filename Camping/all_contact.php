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

$tbName = "contact";

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
$current_tab = "Contact";

// header
header_function($current_tab);

// navbar 
navbar_function($list);

?>

<?php
if (!isset($session_user)) {
    echo "User Only";
} else {
    echo "<div class = 'container'>";

    // all review for adming 
    if ($session_user === "Admin") {

        $sql = "SELECT * from $tbName order by id";
    }
    // own review for user 
    else {
        $sql = "SELECT * from $tbName where user_id = " . $user_id . "";
    }
    $result = $connection->query($sql);

    if ($result) {

        $reviews = $result->num_rows;
        echo "<div>";

        if ($result && $reviews > 0) {
            while ($item = $result->fetch_assoc()) {
                $item = json_decode(json_encode($item), false);
                var_dump($item);

                echo "</br>";
                echo "</br>";
            }
        } else {
            echo "No contants found";
        }
        echo "</div>";
    } else {
        echo "Error: $connection->error";
    }
    echo "</div>";
}
?>

<?php

// footer 
include_once "./component/footer.php";
?>
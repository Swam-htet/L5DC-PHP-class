<?php
session_start();

if (isset($_SESSION['session_user'])) {
    $session_user = $_SESSION['session_user'];
}

// camp id 
if (isset($_GET['id'])) {
    $camp_id = $_GET['id'];
}

// session id 
if (isset($_SESSION['session_id'])) {
    $user_id = $_SESSION['session_id'];
}



// connection and connection check  
include "./config/config.php";
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}

$tbName = "review";

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
$current_tab = "Reviews";

// header
header_function($current_tab);

// navbar 
navbar_function($session_user, $list);

?>

<?php
if (!isset($session_user)) {
    echo "User Only";
} else {
    $review_table = "review";
    $user_table   = "user";

    $sql = "SELECT u.email, u.phoneNumber, u.id AS user_id, r.point, r.comment, r.id AS review_id, r.camp_id FROM $user_table u JOIN review r ON u.id = r.user_id WHERE r.camp_id = '$camp_id'";


    $result = $connection->query($sql);
    if ($result) {

        echo "<div class='card'>";
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $item = json_decode(json_encode($item), false);
?>
                <div class='container bg-light m-2' id='review-<?php echo $item->review_id ?>'>
                    <div class="row p-3">
                        <div class='col-3'>
                            <p class='m-b-2'>Email : <?php echo $item->email ?></p>
                            <p>Phone Number : <?php echo $item->phoneNumber ?></p>
                        </div>
                        <div class='col-6'>
                            <p>
                                Review Message : <?php echo $item->comment ?>
                            </p>
                        </div>
                        <div class='col'>
                            <p>
                                Point : <?php echo $item->point ?>
                            </p>
                        </div>
                    </div>
                </div>

<?php


                // review

            }
            
        } else {
            echo "<div class='alert alert-light p-2'>
                            <p>No Review </p>
                        </div>";
        }
    } else {
        echo "<div class='alert alert-danger'>
                            <p>Error : $connection->error </p>
                        </div>";
    }
}
?>

<?php
view_counter($connection);

// footer 
Here($current_tab);
include_once "./component/footer.php";
?>
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

$tbName = "booking";

// component import 
include_once "./component/header.php";
include_once './component/navbar.php';
include_once "./component/card.php";
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
$current_tab = "Bookings";

// header
header_function($current_tab);

// navbar 
navbar_function($session_user, $list);

?>

<?php
if (!isset($session_user)) {
    echo "User Only";
} else {
    echo "<div class = 'container'>";

    // all review for adming 
    if ($session_user === "Admin") {

        $sql = "SELECT booking.id, booking.no_standard,booking.no_premium,booking.no_improved,booking.date,booking.no_day, User.firstName, User.lastName, User.email, User.phoneNumber, camp.id AS campId, camp.name AS campName FROM booking JOIN User ON booking.user_id = User.id JOIN camp ON booking.camp_id = camp.id";
    }
    // own review for user 
    else {
        $sql = "SELECT booking.id, booking.no_standard,booking.no_premium,booking.no_improved,booking.date,booking.no_day, User.firstName, User.lastName, User.email, User.phoneNumber, camp.id AS campId, camp.name AS campName FROM booking JOIN User ON booking.user_id = User.id JOIN camp ON booking.camp_id = camp.id where User.id= '$user_id'";
    }

    $result = $connection->query($sql);

    if ($result) {

        $reviews = $result->num_rows;

        if ($result && $reviews > 0) {
            while ($item = $result->fetch_assoc()) {
                $item = json_decode(json_encode($item), false);
                

?>
                <div class='container card bg-light'>
                    <div class='row'>
                        <div class='col-4'>
                            <p class='m-b-2'>Booking ID : <?php echo $item->id ?></p>
                            <ul class='m-b-2'>
                                <li class='m-b-2'>Number of standard Room : <?php echo $item->no_standard ?></li>
                                <li class='m-b-2'>Number of Improved Room : <?php echo $item->no_improved ?></li>
                                <li class='m-b-2'>Number of Premium Room : <?php echo $item->no_premium ?></li>

                            </ul>
                            
                            <p class='m-b-2'>Booking Date : <?php echo $item->date ?></p>
                            
                            <p class='m-b-2'>Number of Day : <?php echo $item->no_day ?></p>


                        </div>
                        <div class='col-3'>
                            <p class='m-b-2'>Name : <?php echo $item->firstName." ".$item->lastName ?></p>
                            <p class='m-b-2'>Email : <?php echo $item->email ?></p>
                            <p class='m-b-2'>Phone Number : <?php echo $item->phoneNumber ?></p>

                        </div>
                        <div class='col-3'>
                            <p>To camp : <?php echo $item->campName ?></p>
                        </div>

                    </div>
                </div>

<?php

                // Booking_card($item, $session_user);
            }
        } else {
            echo "<div class='alert alert-warning'>No Booking found</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error: $connection->error</div>";
    }
    echo "</div>";
}
?>
<script src="./app/dropdown.js"></script>

<?php
view_counter($connection);

// footer 
Here($current_tab);
include_once "./component/footer.php";
?>
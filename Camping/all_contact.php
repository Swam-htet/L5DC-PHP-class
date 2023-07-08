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
include_once './component/card.php';
include_once './component/alert.php';
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
$current_tab = "Contact";

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

        $sql = "SELECT contact.id, contact.message, User.firstName, User.lastName, User.email, User.phoneNumber, camp.id AS campId, camp.name AS campName FROM contact JOIN User ON contact.user_id = User.id JOIN camp ON contact.camp_id = camp.id;";
    }
    // own review for user 
    else {
        $sql = "SELECT contact.id, contact.message, User.id, User.firstName, User.lastName, User.email, User.phoneNumber, camp.id AS campId, camp.name AS campName FROM contact JOIN User ON contact.user_id = User.id JOIN camp ON contact.camp_id = camp.id where User.id = $user_id";
    }

    $result = $connection->query($sql);

    if ($result) {

        $reviews = $result->num_rows;
        echo "<div>";

        if ($result && $reviews > 0) {
            while ($item = $result->fetch_assoc()) {
                $item = json_decode(json_encode($item), false);
?>

                <div class='container'>
                    <div class='card bg-light'>
                        <div class='row'>
                            <div class='col-3'>
                                <p class='m-b-2'>Name : <?php echo $item->firstName." ".$item->lastName ?></p>
                                <p class='m-b-2'>Email : <?php echo $item->email ?></p>
                                <p class='m-b-2'>Phone Number : <?php echo $item->phoneNumber ?></p>

                            </div>
                            <div class='col-4'>
                                <p>Message : <?php echo $item->message ?></p>

                            </div>
                            <div class='col-3'>
                                <p>To Camp : <?php echo $item->campName ?></p>

                            </div>

                        </div>
                    </div>
                </div>
<?php
            }
        } else {
            echo "<div class='alert alert-warning'>No Content found</div>";
        }
        echo "</div>";
    } else {
        echo "<div class='alert alert-danger'>Error: $connection->error</div>";
    }
    echo "</div>";
}
?>

<?php
view_counter($connection);

// footer 
Here($current_tab);
include_once "./component/footer.php";
?>
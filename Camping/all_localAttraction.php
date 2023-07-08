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
$current_tab = "Local Attractions";

// header
header_function($current_tab);

// navbar 
navbar_function($session_user, $list);

?>

<?php
if (!isset($session_user)) {
    echo "User Only";
} else {
    $camp_table = "camp";
    $local_table   = "localAttraction";


    $sql = "SELECT l.id,l.name,l.photo,l.description,l.location,c.id as camp_id,c.name as camp_name  FROM $local_table l JOIN $camp_table c ON c.id = l.camp_id where c.id='$camp_id' ";

    $result = $connection->query($sql);
    if ($result) {

        echo "<div class='card'>";
        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $item = json_decode(json_encode($item), false);

?>
                <div class='container' id='local-<?php echo $item->id ?>'>
                    <div class="row card bg-light">
                        <div class="col-5">
                            <div class='card p-2'>
                                <h4 class='m-b-2'>Name : <?php echo $item->name ?></h4>
                                <p>Description : <?php echo $item->description ?></p>

                                <iframe src="<?php echo $item->location ?>" class="card" width="100%" height="80%" frameborder="0"></iframe>
                            </div>
                        </div>
                        <div class="col-5">
                            <img src="<?php echo $item->photo ?>" class="w-100" alt="local Attraction - <?php echo $item->id ?>">
                        </div>
                    </div>
                </div>

<?php

            }
        } else {
            echo "<div class='alert alert-light p-2'>
                            <p>No Local Attarcion </p>
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
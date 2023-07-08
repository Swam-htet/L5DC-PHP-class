<?php

session_start();

// component import 
include_once "./component/header.php";
include_once './component/navbar.php';
include_once "./component/card.php";
include_once "./component/alert.php";
include_once "./component/here.php";
include_once "./component/display.php";
include_once "./component/viewCounter.php";



//  connection and connection check 
include "./config/config.php";
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}


// session user check and id get
if (isset($_SESSION['session_user'])) {
    $session_user = $_SESSION['session_user'];
}
$userId = $_SESSION['session_id'];


?>

<?php

// list for navbar 
$list = array(
    array('name' => 'Home', 'link' => "index.php"),
    array('name' => 'Information', 'link' => "information.php"),

);

// current tab
$current_tab = "Search";


// header
header_function($current_tab);

// navbar 
navbar_function($session_user, $list);

?>



<?php
if (isset($session_user)) {

    if (!empty($_GET)) {

        $review_sql = "insert into review (comment,point,user_id,camp_id) values('" . $_GET['comment'] . "','" . $_GET['point'] . "','" . $_GET['user_id'] . "','" . $_GET['camp_id'] . "')";
        $review_result = $connection->query($review_sql);
        if ($review_result) {
            alert_function("New review is added.", 'success');
        } else {
            alert_function("Connection : " . $connection->error, 'danger');
        }
    }
}
?>

<?php

if (isset($_POST)) {
    $data = json_decode(json_encode($_POST), false);
}
?>




<div class='container-fluid'>



    <?php
    $tbName = "camp";


    if ($data->type === "name") {
        $sql = "SELECT * from $tbName where name like '%$data->keyword%'";
    } else if ($data->type === "country") {
        $sql = "SELECT * from $tbName where country like '%$data->keyword%'";
    } else {
        $sql = "SELECT * from $tbName ";
    }

    $result = $connection->query($sql);
    if ($result) {

        // count the number of user
        $num_pitch = $result->num_rows;
        echo "<h3 class='m-3'> Number of Pitch in $data->type($data->keyword) : $num_pitch </h3>";

        // display flex wrep
        echo "<div class='row'>";


        if ($result->num_rows > 0) {
            while ($item = $result->fetch_assoc()) {
                $item = json_decode(json_encode($item), false);
                // var_dump($item);
    ?>
                <div class='col-5'>
                    <div class='card p-3 m-2 bg-light'>
                        <div class='card-header'>
                            <h3><?php echo $item->name ?></h3>
                        </div>
                        <div class='card-body'>
                            <img src='<?php echo $item->profile ?>' alt='camp profile of <?php echo $item->name ?>'>
                        </div>
                        <div class='card-footer'>

                            <?php
                            if ($session_user === "Admin") {
                            ?>
                                <a href='./camp_profile.php?id=<?php echo $item->id ?>' class='btn btn-warning'>Detail</a>
                                <button class='btn btn-danger' id='btn-delete-<?php echo $item->id ?>' onclick='delete_dropdown_function(<?php echo $item->id ?>)'>Delete</button>
                                <div class='dropdown-box alert alert-danger' id='delete-<?php echo $item->id ?>'>
                                    <h4>Do you want to delete, <?php echo $item->name ?>?</h4>
                                    <div>
                                        <a href='./camp_delete.php?id=<?php echo $item->id ?>' class='btn btn-danger'>Delete</a>
                                        <button class='btn btn-secondary' onclick='delete_dropdown_function(<?php echo $item->id ?>)'>Cancel</button>
                                    </div>
                                </div>
                            <?php

                            }

                            // for user
                            else if ($session_user === "User") {
                            ?>
                                <!-- go to profile -->
                                <a href='./camp_profile.php?id=<?php echo $item->id ?>' class='btn btn-warning'>Detail</a>

                            <?php
                            }
                            ?>
                        </div>
                    </div>
                </div>
            <?php
            }
            ?>

    <?php      } else {
            echo "<h4 class='m-5'>No pitch found</h4>";
        }
        echo "</div>";
    } else {
        alert_function('Error' . $connection->error, 'danger');
    }
    echo "</div>";
    ?>


    <?php
    view_counter($connection);

    // footer 
    Here($current_tab);
    include_once "./component/footer.php";
    ?>
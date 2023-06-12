<?php
session_start();

// component import 
include_once "./component/header.php";
include_once './component/navbar.php';
include_once "./component/card.php";


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
$current_tab = "Information";


// header
header_function($current_tab);

// navbar 
navbar_function($list);

?>

<?php
if (isset($session_user)) {

    if (!empty($_GET)) {

        $review_sql = "insert into review (comment,point,user_id,camp_id) values('" . $_GET['comment'] . "','" . $_GET['point'] . "','" . $_GET['user_id'] . "','" . $_GET['camp_id'] . "')";
        $review_result = $connection->query($review_sql);
        if ($review_result) {
            echo "Review added.";
        } else {
            echo "Connection : " . $connection->error;
        }
    }
}
?>


<?php

echo "<div class = 'container-fluid'>";

$tbName = "camp";

$sql = "SELECT * from $tbName";
$result = $connection->query($sql);

if ($result) {

    // count the number of user
    $num_pitch = $result->num_rows;
    echo "<h3 class='m-3'>Total Number of Pitch : $num_pitch </h3>";

    //  display flex wrep
    echo "<div class='row'>";

    if ($result && $num_pitch > 0) {
        while ($item = $result->fetch_assoc()) {
            $item = json_decode(json_encode($item), false);

            echo "<div class='col-5'>";

            // render item 
            Camp_card($item);


            // for admin
            if ($session_user === "Admin") {

                // camp prfile
                echo "<a href='./camp_profile.php?id=" . $item->id . "' class='btn btn-warning'>More...</a>";

                // camp delete
                echo "<button class='btn btn-danger' id='btn-delete-" . $item->id . "' onclick='delete_dropdown_function(" . $item->id . ")'>Delete</button>
                      <div class='dropdown-box alert alert-danger' id='delete-" . $item->id . "'>
                            <h4>Do you want to delete, " . $item->name . "?</h4>
                               <div>
                                    <a href='./camp_delete.php?id=" . $item->id . "' class='btn btn-danger'>Delete</a> 
                                    <button class='btn btn-secondary' onclick='delete_dropdown_function(" . $item->id . ")'>Cancel</button>
                               </div>
                      </div>
                
                ";
            }
            // for user
            else if ($session_user === "User") {
                // camp prfile
                echo "<a href='./camp_profile.php?id=" . $item->id . "' class='btn btn-warning'>More...</a>";


                // review box
                echo "<form action='" . $_SERVER["PHP_SELF"] . "'>
                        <button class='btn btn-warning' id='btn-id-" . $item->id . "' onclick='review_dropdown_function(" . $item->id . ")' type='button'>Review </button>
                        <div class='dropdown-box' id='review-" . $item->id . "'>
                            <div>
                                <label for='comment'>Comment Here : </label>
                                <textarea name='comment' id='review' cols='40' rows='5'></textarea>
                            </div>
                            <div>
                                <label for='point'>Rate the Camp : </label>
                                <input type='range' min='0' max='10' name='point' id='point' value='0'>
                            </div>
                            <button type='submit' class='btn btn-warning'>Send Review</button>
                            <input type='hidden' name='camp_id' value=" . $item->id . ">
                            <input type='hidden' name='user_id' value = " . $userId . ">";
                echo "  </div>
                    </form>";
            }
            echo "  </div>
                </div>
            </div>";
        }
    } else {
        echo "No pitch found";
    }
    echo "</div>";
} else {
    echo "Error: $connection->error";
}

echo "</div>";

?>

<script src="./app/dropdown.js"></script>
<?php

// footer 
include_once "./component/footer.php";
?>
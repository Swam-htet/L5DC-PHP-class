<?php
// session 
session_start();
if (isset($_SESSION['session_user'])) {
    $session_user = $_SESSION['session_user'];
}

// camp id
$camp_id = $_GET['id'];

// user id 
$user_id = $_SESSION['session_id'];

// connection and connection check 
include "./config/config.php";
$tbName = "user";
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}
$tbName = "camp";


// component import 
include_once "./component/header.php";
include_once './component/navbar.php';

?>

<?php
// post from booking 
if (isset($session_user)) {
    if (isset($_POST['booking'])) {
        $data = json_decode(json_encode($_POST), false);

        $camp_id = $data->camp_id;
        $book_sql = "insert into booking(no_premium,no_improved,no_standard,date,no_day,camp_id,user_id) values('" . $data->premium . "','" . $data->improved . "','" . $data->standard . "','" . $data->date . "','" . $data->day . "','" . $data->camp_id . "','" . $data->user_id . "');";

        $booking_result = $connection->query($book_sql);
        if ($booking_result) {
            echo "Booking Successful";
        } else {
            echo "Error : " . $connection->error;
        }
    }
}
?>


<?php
// post from booking 
if (isset($session_user)) {
    if (isset($_POST['contact'])) {
        $data = json_decode(json_encode($_POST), false);
        $camp_id = $data->camp_id;

        $contact_sql = "insert into contact(message,user_id,camp_id) values('" . $data->message . "','" . $data->user_id . "','" . $data->camp_id . "')";

        $contact_result = $connection->query($contact_sql);
        if ($contact_result) {
            echo "Message Successful";
        } else {
            echo "Error : " . $connection->error;
        }
    }
}
?>


<?php

// list for navbar
$list = array(
    array('name' => 'Home', 'link' => "index.php"),
    array('name' => 'Information', 'link' => "information.php"),

);

// current tab
$current_tab = "Profile";

// header
header_function($current_tab);

// navbar 
navbar_function($list);

?>


<?php
if (isset($session_user)) {

    // session user check 
    if (isset($camp_id)) {

        $sql = "SELECT * FROM $tbName WHERE id = '$camp_id'";
        $result = $connection->query($sql);
        if ($result) {
            if ($result->num_rows > 0) {
                $row = $result->fetch_assoc();
                var_dump($row);
                echo "<hr>";
                if ($session_user === "User") {
?>
<h2 class="text-center">Booking Here </h2>

<div id="booking-form" class="row">
    <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="col-5 p-2">
        <input type="hidden" name="camp_id" value="<?php echo $camp_id ?>">
        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
        <?php include 'component/booking.php' ?>

    </form>
</div>

<?php
                }
            } else {
                echo "No Camp ID.";
            }
        } else {
            echo "Error : " . $connection->error;
        }
    } else {
        echo "No Camp ID";
    }
} else {
    echo "User Only</br>";
    echo  '<a href="create_account.php" class="btn btn-warning">Create account</a>';
}
?>

<?php
if ($session_user === "User") {

?>
<div class="m-5">
    <button class="btn btn-warning m-b-1">Content</button>
    <div class="dropdown">
        <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
            <input type="hidden" name="camp_id" value="<?php echo $camp_id ?>">
            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
            <div class="p-2">
                <label for="message" class="form-text m-b-1">Your Message : </label>
                <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
            </div>
            <button type="submit" class="btn btn-warning" name='contact'>Send</button>
        </form>
    </div>
</div>
<?php
}
?>

<?php
// footer 
include_once "./component/footer.php";
?>
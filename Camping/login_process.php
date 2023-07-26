<?php session_start(); ?>

<?php

// connection and check connection 
include "./config/config.php";
$tbName = "user";
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}

// component import 
include_once "./component/header.php";
include_once './component/navbar.php';
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
$current_tab = "Login";


// header
header_function($current_tab);

// navbar 
navbar_function($session_user, $list);

?>
<?php
// data object of post 
$data = json_decode(json_encode($_POST), false);

include("connection.php");


//sitekey="6Lc0n40mAAAAAECs8_IY2TpqCPNNa57PBcC4A1qV"
//$secretKey = "6Lc0n40mAAAAAMAoPr9sAsv_hL15Mg5IEtdazucZ";


if (isset($_POST['g-recaptcha-response'])) {
    $captcha = $_POST['g-recaptcha-response'];
}



if (!$captcha) {
    alert_function("Please Check the captcha form", 'danger');
    exit;
}

$secretKey = "6Lc0n40mAAAAAMAoPr9sAsv_hL15Mg5IEtdazucZ";


$ip = $_SERVER['REMOTE_ADDR'];



// post request to server
$url = 'https://www.google.com/recaptcha/api/siteverify?secret=' . urlencode($secretKey) .  '&response=' . urlencode($captcha);



$response = file_get_contents($url);
$responseKeys = json_decode($response, true);



// should return JSON with success as true
if ($responseKeys["success"]) {
    alert_function("Thanks for posting comment!", 'success');
} else {
    alert_function("reCaptcha verification failed.", 'danger');
}





if (isset($_SESSION['counter'])) {
    if ($_SESSION['counter'] === 3) {
        setcookie("failure", "1", time() + 60); //60 sec
        echo "<script>
window.location = 'timer.php'
</script>";
    }
} else {
    $_SESSION['counter'] = 1;
}

$sql = "SELECT * FROM $tbName WHERE email='$data->email' AND password='$data->password'";

$result = $connection->query($sql);
if ($result) {
    $no_of_row = $result->num_rows;
    $user_data = $result->fetch_assoc();

    // login fail
    if ($no_of_row == 0) {

        $_SESSION['counter']++;
        alert_function("Login Failure", 'warning');
    } else {
        // login passed
        $_SESSION['session_id'] = $user_data['Id'];
        if ($data->email == "admin@gmail.com") {
            $_SESSION['session_user'] = "Admin";
        } else {
            $_SESSION['session_user'] = "User";
        }
        $_SESSION['counter'] = 0;

        // home page open
        echo "<script>
        window.location = 'index.php';
        </script>";
    }
} else {
    alert_function("Login failed : " . $connection->error, 'danger');
}

?>

<?php
view_counter($connection);

// footer 
Here($current_tab);
include_once "./component/footer.php";
?>
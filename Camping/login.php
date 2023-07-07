<?php

// session start 
session_start();

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



<!-- login -->
<div class="container">
    <div class='card bg-light col-5'>
        <h2 class="text-center m-3">Login Here</h2>
        <div id="p-3">
            <div id="timer_box"></div>
        </div>

        <div class="counter">
            <h3 id="counter-text"></h3>
            <h4 id="alert"></h4>
        </div>

        <form action="
        <?php echo $_SERVER['PHP_SELF']
        ?>
        " method="post" id="login_box">
            <div class='m-3'>
                <label for="emai" class="form-text m-b-2">Email : </label>
                <input type="text" name="email" id="email" placeholder="Enter your email here" class="form-control">
            </div>
            <div class='m-3'>
                <label for="password" class="form-text m-b-2">Password : </label>
                <input type="password" name="password" id="password" placeholder='Enter your password here'
                    class="form-control">
            </div>
            <a href="create_account.php">Create account</a>
            <button id="button" type="submit" name="submit" class="btn btn-warning">Login Here</button>

        </form>
    </div>
</div>

<?php

// if post[submit] is true 
if (isset($_POST["submit"])) {

    // data object of post 
    $data = json_decode(json_encode($_POST), false);

    // query 
    $sql = "SELECT * FROM $tbName WHERE email='$data->email' AND password='$data->password'";

    $result = $connection->query($sql);
    if ($result) {
        $no_of_row = $result->num_rows;
        $user_id = $result->fetch_assoc()['Id'];
        // login fail
        if ($no_of_row === 0) {

            // create couter session 
            $_SESSION['counter'] += 1;
            alert_function("Login available - " . (3 - $_SESSION['counter']), 'warning');

            if ($_SESSION['counter'] >= 3) {
                $_SESSION['login'] = "Locked";
                var_dump($_SESSION['login']);
                echo "<script src='./app/timer.js'></script>";
                $_SESSION['counter'] = 0;
                $_SESSION['login'] = "Unlocked";
            }
        } else {
            // login passed
            $_SESSION['session_id'] = $user_id;
            if ($data->email == "admin@gmail.com") {
                $_SESSION['session_user'] = "Admin";
            } else {
                $_SESSION['session_user'] = "User";
            }
            $_SESSION['counter'] = 0;

            // home page open 
            echo "<script>
                window.location='index.php';</script>";
        }
    } else {
        alert_function("Login failed : " . $connection->error, 'danger');
    }
}

?>

<?php
view_counter($connection);

// footer 
Here($current_tab);
include_once "./component/footer.php";
?>
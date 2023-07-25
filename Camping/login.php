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


<script src='https://www.google.com/recaptcha/api.js' async defer></script>
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
if (isset($_COOKIE['failure'])) {
    echo "Login is blocked!<hr>";
    echo "<a href='login.php'>Login Form</a>";
} else {
?>

<!-- login -->
<div class="container">
    <div class='card bg-light'>
        <h2 class="text-center m-3">Login Here</h2>

        <form action='login_process.php' method='POST'>

            <div class='m-3'>
                <label for="emai" class="form-text m-b-2">Email : </label>
                <input type="text" name="email" id="email" placeholder="Enter your email here" class="form-control">
            </div>
            <div class='m-3'>
                <label for="password" class="form-text m-b-2">Password : </label>
                <input type="password" name="password" id="password" placeholder='Enter your password here'
                    class="form-control">
            </div>

            <div class="g-recaptcha" data-type="image" data-sitekey="6Lc0n40mAAAAAECs8_IY2TpqCPNNa57PBcC4A1qV"></div>

            <a href="create_account.php">Create account</a>
            <button id="button" type="submit" name="submit" class="btn btn-warning">Login Here</button>

        </form>

    </div>
</div>


<?php
}


?>









<?php
view_counter($connection);

// footer 
Here($current_tab);
include_once "./component/footer.php";
?>
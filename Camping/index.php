<?php
session_start();

$session_user = $_SESSION['session_user'];

// session counter 
if (!isset($_SESSION['counter'])) {
    $_SESSION['counter'] = 0;
}
// component import 
include_once "./component/header.php";
include_once './component/navbar.php';

?>

<?php

// list for navbar 
$list = array(
    array('name' => 'Home', 'link' => "index.php"),
    array('name' => 'Information', 'link' => "information.php"),

);

// current tab
$current_tab = "Home";


// header
header_function($current_tab);

// navbar 
navbar_function($list);

?>

<?php
echo "<div class='container card'>";
if ($session_user == "Admin") {
    echo "<h1>Admin Home Page</h1>";
} else if ($session_user == "User") {
    echo "<h1>User Home Page</h1>";
} else {
    echo "<h1>Visitor Home Page</h1>";
}
echo "</div>";

?>


<?php

// footer 
include_once "./component/footer.php";
?>
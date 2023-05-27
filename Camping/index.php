<?php

// component import 
include_once "./component/header.php";
include_once './component/navbar.php';



// navbar list
$list = array(
    array('name' => 'Item 1', 'link' => "#"),
    array('name' => 'Item 2', 'link' => "#"),
    array('name' => 'Item 3', 'link' => "#"),
    array('name' => 'Item 4', 'link' => "#"),

);

$current_tab = "Home";


// header
header_function($current_tab);

// navbar 
navbar_function($list);

?>





<?php 

    // footer 
    include_once "./component/footer.php";
?>

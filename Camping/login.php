<?php

// component import 
include_once "./component/header.php";
include_once './component/navbar.php';



// navbar list
$nav_list = array(
    array('name' => 'Item 1', 'link' => "#"),
    array('name' => 'Item 2', 'link' => "#"),
    array('name' => 'Item 3', 'link' => "#"),
    array('name' => 'Item 4', 'link' => "#"),

);

$current_tab = "Login";


// header
header_function($current_tab);

// navbar 
navbar_function($nav_list);

?>

<!-- login -->
<div class="container">
    <div class="row">

        <form action="login_process.php" method="post">
            <div class='m-1'>
                <label for="emai">Email : </label>
                <input type="text" name="email" id="email" placeholder="Enter your email here">
            </div>
            <div class='m-1'>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password" placeholder='Enter your password here'>
            </div>
            <div></div>
            <button type="submit">Login Here</button>
        </form>
    </div>
</div>





<?php

// footer 
include_once "./component/footer.php";
?>
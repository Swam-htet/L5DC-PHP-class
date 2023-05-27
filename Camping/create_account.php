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

$current_tab = "Register";


// header
header_function($current_tab);

// navbar 
navbar_function($nav_list);

?>

<!-- register  -->
<div class="container">
    <div class="row">

        <form action="create_account_process.php" method="post">
            <div class='m-1'>
                <label for="emai">First Name : </label>
                <input type="text" name="firstName" id="firstName" placeholder="Enter your first name here">
            </div>
            <div class='m-1'>
                <label for="emai">Last Name : </label>
                <input type="text" name="lastName" id="lastName" placeholder="Enter your last name here">
            </div>
            <div class='m-1'>
                <label for="emai">Email : </label>
                <input type="text" name="email" id="email" placeholder="Enter your email here">
            </div>
            <div class='m-1'>
                <label for="phoneNumber">Phone Number : </label>
                <input type="text" name="phoneNumber" id="phone Number" placeholder="Enter your phone number here">
            </div>
            <div class='m-1'>
                <label for="password">Password : </label>
                <input type="password" name="password" id="password" placeholder='Enter your password here'>
            </div>
            <div class='m-1'>
                <label for="confirmPassword">Confirm Password : </label>
                <input type="password" name="confirmPassword" id="confirmPassword" placeholder='Enter your password again'>
            </div>
            <div></div>
            <button type="submit">Register Here</button>
        </form>
    </div>
</div>





<?php

// footer 
include_once "./component/footer.php";
?>
<?php
session_start();

$session_user = $_SESSION['session_user'];

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
$current_tab = "Home";


// header
header_function($current_tab);

// navbar 
navbar_function($session_user, $list);

?>

<?php
echo "<div class='container card'>";
if ($session_user == "Admin") {
    echo "<h2>Admin Home Page</h2>";
} else if ($session_user == "User") {
    echo "<h2>User Home Page</h2>";
} else {
    echo "<h2>Visitor Home Page</h2>";
}
echo "</div>";

?>


<!-- carousel  -->
<div class="container-fluid bg-light" id='carousel-display'>
    <div class="carousel-cards">

        <div class='card carousel-card' visible>
            <img src="./src/carousel/carousel_1.jpg" class='carousel-image' />
            <h3 class='m-b-2 m-t-3'>Nature Immersion</h3>
            <p class='m-b-2'>Camping allows you to immerse yourself in nature and escape the hustle and bustle of daily life. It provides an opportunity to breathe in fresh air, appreciate stunning landscapes, and reconnect with the natural world</p>
        </div>


        <div class='card carousel-card' hidden>
            <img src="./src/carousel/carousel_2.jpg" class='carousel-image' />
            <h3 class='m-b-2 m-t-3'>Relaxation and Stress Relief</h3>
            <p class='m-b-2'> Camping offers a chance to unwind and disconnect from technology and everyday stressors. Spending time outdoors, surrounded by serene surroundings, can help reduce stress, promote relaxation, and improve overall well-being.</p>
        </div>
        <div class='card carousel-card' hidden>
            <img src="./src/carousel/carousel_3.jpg" class='carousel-image' />
            <h3 class='m-b-2 m-t-3'>Outdoor Activities</h3>
            <p class='m-b-2'>Camping opens doors to a variety of outdoor activities such as hiking, fishing, swimming, and wildlife observation. It provides opportunities for adventure, exploration, and discovering new interests in the natural environment.</p>
        </div>

        <div class='card carousel-card' hidden>
            <img src="./src/carousel/carousel_4.jpg" class='carousel-image' />
            <h3 class='m-b-2 m-t-3'>Quality Time with Loved Ones</h3>
            <p class='m-b-2'>Camping allows you to spend quality time with family and friends away from distractions. It fosters bonding, creates lasting memories, and promotes meaningful connections through shared experiences.</p>
        </div>
        <div class='card carousel-card' hidden>
            <img src="./src/carousel/carousel_5.jpg" class='carousel-image' />
            <h3 class='m-b-2 m-t-3'>Disconnect and Recharge</h3>
            <p class='m-b-2'>Camping provides a chance to disconnect from technology and reconnect with yourself and the people around you. It offers an opportunity to detach from the digital world and appreciate the simplicity and beauty of nature.

            </p>
        </div>

    </div>
    <div class='btn-group'>
        <button class="btn btn-warning display-prev" id='prev'>&#10094;</button>
        <button class="btn btn-warning display-next" id='next'>&#10095;</button>
    </div>
</div>

<!-- google map and search box -->
<div class='container m-t-5'>
    <div class='row'>
        <div class='col-6'>
            <h4 class='m-b-3'>Google Map Navigation - </h4>
            <iframe class="w-100" src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622608.415546101!2d-10.02706748750002!3d50.0649204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486ac0e3f7cf4181%3A0x6d741d2f93e92fbd!2sWild%20Camping%20Cornwall!5e0!3m2!1sen!2smm!4v1688584834797!5m2!1sen!2smm" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class='col-4'>
            <form class="card bg-light" action="search_camp.php" method="post">
                <h4 class='text-center'>Search Camp Here - </h4>
                <div class="p-3">
                    <div class="m-b-3">
                        <label for="keyword" class='form-label m-2'>Search Here : </label>
                        <input type="text" class="form-control m-t-3" name="keyword" placeholder="Enter Search Keyword" id="inputSearch">
                    </div>
                    <div class="m-b-3">
                        <label for="keyword" class='form-label m-2'>Search Type : </label>

                        <select class='form-control m-t-3' name='type'>
                            <option value='-----'> ----- </option>

                            <option value='country'>Country</option>
                            <option value='name'>Name</option>

                        </select>
                    </div>
                    <button class='btn btn-warning' type="submit">Search Here</button>

                </div>

            </form>

        </div>

    </div>
</div>



<!-- youtube -->
<div class='container m-4'>
    <div class='row'>
        <div class='col-10'>
            <iframe class="card" width="100%" height="400px" src="https://www.youtube.com/embed/TU3ND2cIAFM" title="Solo Tarp Wild Camping On A Windy Hill 🌤️" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>
        </div>
    </div>
</div>



<div id="wearable" class="container m-t-5">
    <h3 class='m-5 text-center'>Available Wearable Technology</h3>
    <div class="row">
        <!-- wearable item -->
        <div class="col-5">
            <div>


                <div class="bg-light p-2">
                    <h4 class='m-b-3'>Leo Smart Watch</h4>
                    <img class='w-100' src="./src/wearble/item-1.jpg" alt="item one">

                    <p class='m-b-3'>2.2" The smart watch project aims to develop a wearable device that combines the functionality of a traditional watch.</p>
                    <button class='btn btn-primary'>$210</button>
                </div>
            </div>
        </div>
        <!-- wearable item -->
        <div class="col-5">
            <div>


                <div class="bg-light p-2">
                    <h4 class='m-b-3'>Garmin Rugged GPS</h4>
                    <img class='w-100' src="./src/wearble/item-2.jpg" alt="item two">

                    <p class='m-1'>Battery life up to 28days, track your advatures, build in sport mode, type-c charging
                        system, Rugged GPS system with fiber case</p>
                    <button class='btn btn-primary'>$190</button>

                </div>
            </div>
        </div>
        <!-- wearable item -->
        <div class="col-5">
            <div>


                <div class="bg-light p-2">
                    <h4 class='m-b-3'>Joji Yoga Mats</h4>
                    <img class='w-100' src="./src/wearble/item-3.jpeg" alt="item one">

                    <p class='m-b-3'>Yoga mats provide cushioning and traction for yoga practice, ensuring comfort and stability exercise.</p>
                    <button class='btn btn-primary'>$20</button>


                </div>
            </div>
        </div>
        <!-- wearable item -->
        <div class="col-5">
            <div>


                <div class="bg-light p-2">
                    <h4 class='m-b-3'>Sunflow camp kit</h4>
                    <img class='w-100' src="./src/wearble/item-4.jpg" alt="item one">

                    <p class='m-b-3'>2.2" sunlight-redable, preloaded with topo active maps with routable roads and trails
                        for
                        camping, support GPS with satelite system, 8GB of storage</p>
                    <button class='btn btn-primary'>$200</button>

                </div>
            </div>
        </div>
        <!-- wearable item -->
        <div class="col-5">
            <div>


                <div class="bg-light p-2">
                    <h4 class='m-1'>Garmin Rugged Outdoor Watch with GPS</h4>
                    <img class='w-100' src="./src/wearble/item-5.jpg" alt="item one">

                    <p class='m-1'>Battery life up to 28days, track your advatures, build in sport mode, type-c charging
                        system, Rugged GPS system with fiber case</p>
                    <button class='btn btn-primary'>$110</button>

                </div>
            </div>
        </div>

    </div>
</div>





<script src='./app/carousel.js'></script>



<?php


view_counter($connection);



// footer 
Here($current_tab);
include_once "./component/footer.php";
?>
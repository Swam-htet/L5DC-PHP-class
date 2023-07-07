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
    echo "<h1>Admin Home Page</h1>";
} else if ($session_user == "User") {
    echo "<h1>User Home Page</h1>";
} else {
    echo "<h1>Visitor Home Page</h1>";
}
echo "</div>";

?>


<!-- carousel  -->
<div class="container-fluid bg-light" id='carousel-display'>
    <div class="carousel-cards">

        <div class='card carousel-card' visible>
            <img src="./src/carousel/carousel_1.jpg" class='carousel-image' />
            <h2 class='m-b-2'>Header</h2>
            <p class='m-b-2'>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam facere, est non dignissimos
                doloribus
                architecto, unde libero iste odio quibusdam animi, doloremque tempora quod. Repellat est animi
                expedita
                possimus accusantium.</p>
        </div>


        <div class='card carousel-card' hidden>
            <img src="./src/carousel/carousel_2.jpg" class='carousel-image' />
            <h2 class='m-b-2'>Header Three</h2>
            <p class='m-b-2'>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam facere, est non dignissimos
                doloribus
                architecto, unde libero iste odio quibusdam animi, doloremque tempora quod. Repellat est animi
                expedita
                possimus accusantium.</p>
        </div>
        <div class='card carousel-card' hidden>
            <img src="./src/carousel/carousel_3.jpg" class='carousel-image' />
            <h2 class='m-b-2'>Header Three</h2>
            <p class='m-b-2'>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam facere, est non dignissimos
                doloribus
                architecto, unde libero iste odio quibusdam animi, doloremque tempora quod. Repellat est animi
                expedita
                possimus accusantium.</p>
        </div>

        <div class='card carousel-card' hidden>
            <img src="./src/carousel/carousel_4.jpg" class='carousel-image' />
            <h2 class='m-b-2'>Header Three</h2>
            <p class='m-b-2'>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam facere, est non dignissimos
                doloribus
                architecto, unde libero iste odio quibusdam animi, doloremque tempora quod. Repellat est animi
                expedita
                possimus accusantium.</p>
        </div>
        <div class='card carousel-card' hidden>
            <img src="./src/carousel/carousel_5.jpg" class='carousel-image' />
            <h2 class='m-b-2'>Header Three</h2>
            <p class='m-b-2'>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Ullam facere, est non dignissimos
                doloribus
                architecto, unde libero iste odio quibusdam animi, doloremque tempora quod. Repellat est animi
                expedita
                possimus accusantium.</p>
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
        <div class='col-6 p-2'>
            <h4 class='m-b-3'>Google Map Navigation - </h4>
            <iframe class=" w-100"
                src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d2622608.415546101!2d-10.02706748750002!3d50.0649204!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x486ac0e3f7cf4181%3A0x6d741d2f93e92fbd!2sWild%20Camping%20Cornwall!5e0!3m2!1sen!2smm!4v1688584834797!5m2!1sen!2smm"
                width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>

        <div class='col-4'>
            <form class="card bg-light" action="search_camp.php" method="post">
                <h4 class='text-center'>Search Camp Here - </h4>
                <div class="p-3">
                    <div class="m-b-3">
                        <label for="keyword" class='form-label m-2'>Search Here : </label>
                        <input type="text" class="form-control m-t-3" name="keyword" placeholder="Enter Search Keyword"
                            id="inputSearch">
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
<div class='container'>
    <div class='row'>
        <div class='col-6'>
            <iframe class="card" width="100%" height="100%" src="https://www.youtube.com/embed/TU3ND2cIAFM"
                title="Solo Tarp Wild Camping On A Windy Hill 🌤️" frameborder="0"
                allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share"
                allowfullscreen></iframe>
        </div>
    </div>
</div>



<div id="wearable" class="container m-t-5">
    <h3 class='m-5 text-center'>Available Wearable Technology</h3>
    <div class="row">
        <div class="col-2">
            <div class="bg-light p-2">
                <h4 class='m-b-3'>Garmin Rugged Hanheld GPS Navigator</h4>
                <p class='m-b-3'>2.2" sunlight-redable, preloaded with topo active maps with routable roads and trails
                    for
                    camping, support GPS with satelite system, 8GB of storage</p>
                <img class='w-100' src="./src/wearble/wearable_1.jpg" alt="item one">
            </div>
        </div>
        <div class="col-2">
            <div class="bg-light p-2">
                <h4 class='m-b-3'>Garmin Rugged Hanheld GPS Navigator</h4>
                <p class='m-b-3'>2.2" sunlight-redable, preloaded with topo active maps with routable roads and trails
                    for
                    camping, support GPS with satelite system, 8GB of storage</p>
                <img class='w-100' src="./src/wearble/wearable_1.jpg" alt="item one">
            </div>
        </div>
        <div class="col-2">
            <div class="bg-light p-2">
                <h4 class='m-b-3'>Garmin Rugged Hanheld GPS Navigator</h4>
                <p class='m-b-3'>2.2" sunlight-redable, preloaded with topo active maps with routable roads and trails
                    for
                    camping, support GPS with satelite system, 8GB of storage</p>
                <img class='w-100' src="./src/wearble/wearable_1.jpg" alt="item one">
            </div>
        </div>
        <div class="col-2">
            <div class="bg-light p-2">
                <h4 class='m-b-3'>Garmin Rugged Hanheld GPS Navigator</h4>
                <p class='m-b-3'>2.2" sunlight-redable, preloaded with topo active maps with routable roads and trails
                    for
                    camping, support GPS with satelite system, 8GB of storage</p>
                <img class='w-100' src="./src/wearble/wearable_1.jpg" alt="item one">
            </div>
        </div>
        <div class="col-2">
            <div class="bg-light p-2">
                <h4 class='m-b-3'>Garmin Rugged Hanheld GPS Navigator</h4>
                <p class='m-b-3'>2.2" sunlight-redable, preloaded with topo active maps with routable roads and trails
                    for
                    camping, support GPS with satelite system, 8GB of storage</p>
                <img class='w-100' src="./src/wearble/wearable_1.jpg" alt="item one">
            </div>
        </div>
        <!--  
        <div class="col-2">
            <div class="card p-2 bg-light">
                <h3 class='m-1'>Garmin Rugged Outdoor Watch with GPS</h3>
                <p class='m-1'>Battery life up to 28days, track your advatures, build in sport mode, type-c charging
                    system, Rugged GPS system with fiber case</p>
                <img class='m-1' src="./src/wearble/wearable_2.jpg" alt="item one">
            </div>
        </div>
        <div class="col-2">
            <div class="card p-2 bg-light">
                <h3 class='m-1'>Merrel Siren Edge Hhiking Shoe</h3>
                <p> lace closure, Mesh, Made in USA, Breathable mesh lining</p>
                <img class='m-1' src="./src/wearble/wearable_3.jpg" alt="item three">
            </div>
        </div>
        <div class="col-2">
            <div class="card p-2 bg-light">
                <h3 class='m-1'>Columbia Women's Bora Booney</h3>
                <p class='m-1'>100% Nylon, Drawstring closure, Always Sunny, Water proof, easy to dry</p>
                <img class='m-1' src="./src/wearble/wearable_4.jpg" alt="item four">
            </div>
        </div>
        <div class="col-2">
            <div class="card p-2 bg-light">
                <h3 class='m-1'>Coleman Multi Pennel Recharable Light Lampe</h3>
                <p class='m-1'>up to 800 lumeans for base, rechargable, battery life up to 4days, water resistance,
                    3
                    year warranty</p>
                <img class='m-1' src="./src/wearble/wearable_5.jpg" alt="item five">
            </div>
        </div> -->
    </div>
</div>





<script src='./app/carousel.js'></script>



<?php


view_counter($connection);



// footer 
Here($current_tab);
include_once "./component/footer.php";
?>
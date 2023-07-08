<?php
// session 
session_start();
if (isset($_SESSION['session_user'])) {
    $session_user = $_SESSION['session_user'];
}

// camp id 
if (isset($_GET['id'])) {
    $camp_id = $_GET['id'];
}

// session id 
if (isset($_SESSION['session_id'])) {
    $user_id = $_SESSION['session_id'];
}


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
include_once "./component/card.php";
include_once "./component/alert.php";
include_once "./component/viewCounter.php";
include_once "./component/here.php";


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
navbar_function($session_user, $list);

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
            alert_function("Booking Successful", 'success');
        } else {
            alert_function('Error : ' . $connection->error, "danger");
        }
    }
}
?>

<?php
// post from contact 
if (isset($session_user)) {
    if (isset($_POST['contact'])) {
        $data = json_decode(json_encode($_POST), false);
        $camp_id = $data->camp_id;

        $contact_sql = "insert into contact(message,user_id,camp_id) values('" . $data->message . "','" . $data->user_id . "','" . $data->camp_id . "')";

        $contact_result = $connection->query($contact_sql);
        if ($contact_result) {
            alert_function("Message Successful", 'success');
        } else {
            alert_function("Error : " . $connection->error, "danger");
        }
    }
}
?>

<?php
// post from review 
if (isset($session_user)) {
    if (isset($_POST['review'])) {
        $data = json_decode(json_encode($_POST), false);
        $camp_id = $data->camp_id;
        $review_sql = "insert into review(comment,point,user_id,camp_id) values('" . $data->comment . "','" . $data->point . "','" . $data->user_id . "','" . $data->camp_id . "')";
        $review_result = $connection->query($review_sql);
        if ($review_result) {
            alert_function("Add Review Successful", 'success');
        } else {
            alert_function("Error : " . $connection->error, "danger");
        }
    }
}
?>

<?php
// post from local attraction  
if (isset($session_user)) {
    if (isset($_POST['local'])) {
        $data = json_decode(json_encode($_POST), false);
        $camp_id = $data->camp_id;

        // file path and copy 
        $path = "src/photos/";

        $photo_dist = $path . $_FILES['photo']['name'];
        $photo_src = $_FILES['photo']['tmp_name'];

        $photo_copy = copy($photo_src, $photo_dist);


        $sql = "insert into localAttraction(name,description,location,photo,camp_id) values('" . $data->name . "','" . $data->description . "','" . $data->location . "','" . $photo_dist . "','" . $data->camp_id . "')";

        $result = $connection->query($sql);
        if ($result) {
            alert_function("Add Review Successful", 'success');
        } else {
            alert_function("Error : " . $connection->error, "danger");
        }
    }
}
?>

<?php
// if user 
if (isset($session_user)) {
    // if camp_id 
    if (isset($camp_id)) {
        $sql = "SELECT * FROM $tbName WHERE id = '$camp_id'";
        $result = $connection->query($sql);

        // if result 
        if ($result) {

            // num_row > 0 
            if ($result->num_rows > 0) {
                $item = $result->fetch_assoc();
                $item = json_decode(json_encode($item), false);

?>
                <!-- profile  -->
                <div class='card bg-light'>
                    <!-- name header  -->
                    <h2 class='m-b-4'>Camp Name : <?php echo $item->name ?></h2>

                    <!-- slide show  -->
                    <img class='w-100' src='<?php echo $item->slideShow ?>' alt='Slideshow Image of <?php echo $item->name ?>'>

                    <div class='row'>
                        <div class='col-5'>

                            <!-- feature list  -->
                            <div class='p-2 m-3'>
                                <h3 class='m-b-3'>Available Feature list - </h3>

                                <?php
                                $array = explode(", ", $item->features);
                                echo '<ul class="list">';
                                foreach ($array as $a) {
                                    echo '<li class="m-b-2">' . $a . '</li>';
                                }
                                echo '</ul>';
                                ?>

                            </div>

                            <!-- location -->
                            <div class='p-2 m-3'>
                                <h3 class='m-b-2'>Google Map Direction - </h3>
                                <!-- location  -->
                                <iframe src="<?php echo $item->location ?>" class="w-100" height="40%" frameborder="0"></iframe>
                            </div>

                            <?php

                            // review box 
                            if ($session_user === "User") {
                            ?>
                                <!-- review  -->
                                <div class="bg-light card">
                                    <h3 class="">Give Reivew Here - </h3>
                                    <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $item->id ?>" method="post" class="p-2">
                                        <input type="hidden" name="camp_id" value="<?php echo $camp_id ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                        <div>
                                            <label for='comment'>Comment Here : </label>
                                            <textarea name='comment' id='review' cols='40' rows='5'></textarea>
                                        </div>
                                        <div>
                                            <label for='point'>Rate the Camp : </label>
                                            <input type='range' min='0' max='10' name='point' id='point' value='0'>
                                        </div>


                                        <button type="submit" name='review' class="btn btn-warning m-b-1">Add Review</button>

                                    </form>
                                </div>

                            <?php
                            }

                            ?>



                        </div>
                        <div class='col-5'>
                            <!-- about -->
                            <div class='p-4 m-3'>
                                <h4 class='m-b-3'>About : <?php echo $item->name ?></h4>

                                <ul>
                                    <li class='m-b-2'>Phone Number : <?php echo $item->phone ?> </li>
                                    <li class='m-b-2'>Address : <?php echo $item->address ?> </li>

                                    <li class='m-b-2'>Coutry : <?php echo $item->country ?> </li>
                                </ul>

                                <?php

                                // contact box 
                                if ($session_user === "User") {
                                ?>

                                    <div class="">
                                        <form action="<?php echo $_SERVER["PHP_SELF"] . "?id=" . $item->id ?>" method="post">
                                            <input type="hidden" name="camp_id" value="<?php echo $camp_id ?>">
                                            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                            <div class="">
                                                <label for="message" class="form-text m-b-1">Your Message : </label>
                                                <textarea name="message" id="message" class="form-control" cols="30" rows="5"></textarea>
                                            </div>
                                            <button type="submit" class="btn btn-warning" name='contact'>Send</button>
                                        </form>
                                    </div>
                                <?php
                                }
                                ?>

                                <!-- room -->
                                <div class='p-2 m-3'>
                                    <h3 class='m-b-3'>Available Room : </h3>

                                    <ul class='list'>
                                        <li class='m-b-2'>Number of Premium Room : <?php echo $item->no_premium ?></li>
                                        <li class='m-b-2'>Number of Standard Room : <?php echo $item->no_standard ?></li>
                                        <li class='m-b-2'>Number of Improved Room : <?php echo $item->no_improved ?></li>

                                    </ul>
                                </div>


                                <!-- photo -->
                                <div class='p-3'>
                                    <img src="<?php echo $item->profile ?>" class="w-100" alt='photo-<?php echo  $item->name ?>'>
                                </div>


                            </div>

                            <?php
                            // local attraction box 
                            if ($session_user === "Admin") {
                            ?>
                                <div class='bg-light card'>
                                    <h3 class="m-b-4">Add Local Attraction Here - </h3>

                                    <form action=' <?php echo $_SERVER["PHP_SELF"] . "?id=" . $item->id ?>' method='post' enctype="multipart/form-data">
                                        <div class='m-b-3'>
                                            <label class='form-label'>Enter Name : </label>
                                            <input type="text" class="form-control m-t-2" name="name" placeholder="Enter Name">
                                        </div>
                                        <div class='m-b-3'>
                                            <labe class='form-label'>Enter Location : </labe>
                                            <input type="text" class="form-control m-t-2" name="location" placeholder="Enter Location">
                                        </div>
                                        <div class='m-b-3'>
                                            <label class='form-label'>Enter Description : </label>
                                            <input type="text" class="form-control m-t-2" name="description" id="" placeholder="Enter Description">
                                        </div>
                                        <div class='m-b-3'>
                                            <label class='form-label'>Upload Photo : </label>
                                            <input type="file" class="form-control m-t-2" name="photo" id="" placeholder="Upload File">
                                        </div>
                                        <input type="hidden" name="camp_id" value="<?php echo $camp_id ?>">
                                        <button type='submit' class='btn btn-warning' name='local'>Add Local Attraction</button>

                                    </form>

                                </div>
                            <?php
                            }


                            ?>


                            <?php

                            // booking box 
                            if ($session_user === "User") {

                            ?>
                                <!-- booking  -->
                                <div class="bg-light card">
                                    <h3 class="">Booking Here - </h3>
                                    <form action="<?php echo $_SERVER['PHP_SELF'] . "?id=" . $item->id ?>" method="post" class="p-2">
                                        <input type="hidden" name="camp_id" value="<?php echo $camp_id ?>">
                                        <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                        <div>
                                            <label class="form-text m-b-1" for="premium">Number of Premium Pitch : </label>
                                            <input class="form-control m-b-1" type="number" min="0" value="0" name="premium" id="premium">
                                        </div>
                                        <div>
                                            <label class="form-text m-b-1" for="improved">Number of Improved Pitch : </label>
                                            <input class="form-control m-b-1" type="number" min="0" value="0" name="improved" id="improved">
                                        </div>
                                        <div>
                                            <label class="form-text m-b-1" for="standard">Number of Standard Pitch : </label>
                                            <input class="form-control m-b-1" type="number" min="0" value="0" name="standard" id="standard">
                                        </div>
                                        <div>
                                            <label class="form-text m-b-1" for="date">Choose Booking Date : </label>
                                            <input class="form-control m-b-1" type="date" name="date" id="date">
                                        </div>
                                        <div>
                                            <label for="day" class="form-text m-b-1">Number of Day: </label>
                                            <input type="number" class="form-control" min="0" value="0" name="day" id="day">
                                        </div>

                                        <button type="submit" name='booking' class="btn btn-warning m-b-1">Book</button>

                                    </form>
                                </div>

                            <?php
                            }

                            ?>

                        </div>

                    </div>
                </div>

                <!-- local attraction  -->
                <div class='container'>
                    <h4 class='m-b-4'>Local Attraction Near : </h4>
                    <?php
                    if ($session_user === "Admin" || $session_user === "User") {
                        $camp_table = "camp";
                        $local_table   = "localAttraction";

                        $sql = "SELECT l.id,l.name,l.photo,l.description,l.location,c.id as camp_id,c.name as camp_name  FROM $local_table l JOIN $camp_table c ON c.id = l.camp_id where c.id='$camp_id' limit 1;";

                        $result = $connection->query($sql);
                        if ($result) {
                            if ($result->num_rows > 0) {
                                while ($item = $result->fetch_assoc()) {
                                    $item = json_decode(json_encode($item), false);

                    ?>
                                    <div class='container' id='local-<?php echo $item->id ?>'>
                                        <div class="row card bg-light">
                                            <div class="col-5">
                                                <div class='card p-2'>
                                                    <h4 class='m-b-2'>Name : <?php echo $item->name ?></h4>
                                                    <p>Description : <?php echo $item->description ?></p>

                                                    <iframe src="<?php echo $item->location ?>" class="card" width="100%" height="80%" frameborder="0"></iframe>
                                                </div>
                                            </div>
                                            <div class="col-5">
                                                <img src="<?php echo $item->photo ?>" class="w-100" alt="local Attraction - <?php echo $item->id ?>">
                                            </div>
                                        </div>
                                    </div>

                    <?php
                        
                                }
                                echo "<div class='m-3'>
                                <a href='all_localAttraction.php?id=$camp_id' class='btn btn-warning'>More Local Attraction</a>
                        </div>";
                            } else {
                                echo "<div class='alert alert-light p-2'>
                                        <p>No Local Attraction </p>
                                    </div>";
                            }
                        } else {
                            echo "<div class='alert alert-danger'>
                            <p>Error : $connection->error </p>
                        </div>";
                        }
                    }


                    ?>
                </div>

                <?php

                // top review display
                if ($session_user === "Admin" || $session_user === "User") {
                    $review_table = "review";
                    $user_table   = "user";

                    $sql = "SELECT u.email, u.phoneNumber, u.id AS user_id, r.point, r.comment, r.id AS review_id, r.camp_id FROM $user_table u JOIN review r ON u.id = r.user_id WHERE r.camp_id = '$camp_id' limit 5";


                    $result = $connection->query($sql);
                    if ($result) {

                        echo "<div class='card'>";
                        if ($result->num_rows > 0) {
                            while ($item = $result->fetch_assoc()) {
                                $item = json_decode(json_encode($item), false);
                ?>
                                <div class='container bg-light m-2' id='review-<?php echo $item->review_id ?>'>
                                    <div class="row p-3">
                                        <div class='col-3'>
                                            <p class='m-b-2'>Email : <?php echo $item->email ?></p>
                                            <p>Phone Number : <?php echo $item->phoneNumber ?></p>
                                        </div>
                                        <div class='col-6'>
                                            <p>
                                                Review Message : <?php echo $item->comment ?>
                                            </p>
                                        </div>
                                        <div class='col'>
                                            <p>
                                                Point : <?php echo $item->point ?>
                                            </p>
                                        </div>
                                    </div>
                                </div>

                <?php


                                // review

                            }
                            echo "<div class='m-3'>
                                <a href='all_review.php?id=$camp_id' class='btn btn-warning'>More Review</a>
                        </div>";
                            echo "</div";
                        } else {
                            echo "<div class='alert alert-light p-2'>
                            <p>No Review </p>
                        </div>";
                        }
                    } else {
                        echo "<div class='alert alert-danger'>
                            <p>Error : $connection->error </p>
                        </div>";
                    }
                }
            }
            // num_row = 0 
            else { ?>
                <div class="alert alert-warning">
                    <p class='m-3'>No Such Camp</p>
                </div>
            <?php
            }
        }
        // no result 
        else {
            ?>
            <div class='alert alert-warning'>
                <p class='m-3'>Error : <?php echo "$connection->error"; ?></p>
            </div>
        <?php
        }
    }

    // no camp id 
    else {
        ?>
        <div class='alert alert-warning'>
            <p class='m-3'>No Camp ID</p>
        </div>
    <?php
    }
}
// no user 
else {
    ?>
    <div class='alert alert-warning'>
        <h3 class='m-3'>User Only</h3>
        <a href="create_account.php" class="">Create account</a>
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
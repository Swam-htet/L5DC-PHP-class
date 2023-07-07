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
include_once "./component/alert.php";
include_once "./component/viewCounter.php";


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
// post from booking 
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
// post from local 
if (isset($session_user)) {
    if (isset($_POST['local'])) {
        $data = json_decode(json_encode($_POST), false);
        var_dump($data);
    }
}
?>

<?php
// post from review 
if (isset($session_user)) {
    if (isset($_POST['review'])) {
        $data = json_decode(json_encode($_POST), false);
        var_dump($data);
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
                $row = $result->fetch_assoc();

                // profile 
                var_dump($row);


                // contact box 
                if ($session_user === "User") {
?>
                    <div class="m-5">
                        <button class="btn btn-warning m-b-1">Contact - </button>
                        <div class="dropdown">
                            <form action="<?php echo $_SERVER["PHP_SELF"] ?>" method="post">
                                <input type="hidden" name="camp_id" value="<?php echo $camp_id ?>">
                                <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                                <div class="p-2">
                                    <label for="message" class="form-text m-b-1">Your Message : </label>
                                    <textarea name="message" id="message" class="form-control" cols="30" rows="10"></textarea>
                                </div>
                                <button type="submit" class="btn btn-warning" name='contact'>Send</button>
                            </form>
                        </div>
                    </div>
                <?php
                }

                // review box 


                // booking box 
                if ($session_user === "User") {

                ?>

                    <h2 class="text-center">Booking Here </h2>

                    <div id="booking-form" class="row">
                        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post" class="col-5 p-2">
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

                // local attraction box 

                if ($session_user === "Admin") {
                ?>
                    <div class='col-6 p-5 bg-light card'>

                        <form action='<?php echo $_SERVER["PHP_SELF"] ?>' method='post'>
                            <div class='m-b-3'>
                                <label class='form-label'>Enter Name : </label>
                                <input type="text" class="form-control m-t-2" name="name" placeholder="Enter Name">
                            </div>
                            <div class='m-b-3'>
                                <labe class='form-label' l>Enter Location : </labe>
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
                            <input type="hidden" name="user_id" value="<?php echo $user_id ?>">
                            <button type='submit' class='btn btn-warning' name='local'>Add Local Attraction</button>

                        </form>

                    </div>
                <?php
                }

            }
            // num_row = 0 
            else { ?>
                <div class="alert alert-warning">
                    <h3 class='m-3'>No Such Camp</h3>
                </div>
            <?php
            }
        }
        // no result 
        else {
            ?>
            <div class='alert alert-warning'>
                <h3 class='m-3'>Error : <?php echo "$connection->error"; ?></h3>
            </div>
        <?php
        }
    }

    // no camp id 
    else {
        ?>
        <div class='alert alert-warning'>
            <h3 class='m-3'>No Camp ID</h3>
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
include_once "./component/footer.php";
?>
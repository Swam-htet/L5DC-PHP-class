<?php
session_start();

$user_id = $_SESSION['session_id'];
if (isset($_SESSION['session_user'])) {
    $session_user = $_SESSION['session_user'];
}


// connection and connection check  
include "./config/config.php";
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}

$tbName = "contact";

// component import 
include_once "./component/header.php";
include_once './component/navbar.php';
include_once './component/card.php';
include_once './component/alert.php';
include_once "./component/here.php";
include_once "./component/viewCounter.php";


?>

<?php
// post from contact 
if (isset($session_user)) {
    if (isset($_POST['contact'])) {
        $data = json_decode(json_encode($_POST), false);

        $contact_sql = "insert into contact(message,user_id) values('" . $data->message . "','" . $data->user_id . "')";

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

// list for navbar 
$list = array(
    array('name' => 'Home', 'link' => "index.php"),
    array('name' => 'Information', 'link' => "information.php"),

);

// current tab 
$current_tab = "Contact";

// header
header_function($current_tab);

// navbar 
navbar_function($session_user, $list);

?>

<?php
if (!isset($session_user)) {
    echo "User Only";
} else {
    echo "<div class = 'container'>";

    // all review for adming 
    if ($session_user === "Admin") {

        $sql = "SELECT contact.id, contact.message, User.firstName, User.lastName, User.email, User.phoneNumber FROM contact JOIN User ON contact.user_id = User.id";
    }
    // own review for user 
    else {
        $sql = "SELECT contact.id, contact.message, User.firstName, User.lastName, User.email, User.phoneNumber FROM contact JOIN User ON contact.user_id = User.id where User.id='$user_id'";
    }

    // $sql    = "Select * from contact";
    $result = $connection->query($sql);

    if ($result) {

        $reviews = $result->num_rows;
        echo "<div>";

        if ($result && $reviews > 0) {
            while ($item = $result->fetch_assoc()) {
                $item = json_decode(json_encode($item), false);
?>

                <div class='container'>
                    <div class='card bg-light'>
                        <div class='row'>
                            <div class='col-3'>
                                <p class='m-b-2'>Name : <?php echo $item->firstName . " " . $item->lastName ?></p>
                                <p class='m-b-2'>Email : <?php echo $item->email ?></p>
                                <p class='m-b-2'>Phone Number : <?php echo $item->phoneNumber ?></p>

                            </div>
                            <div class='col-7'>
                                <p>Message : <?php echo $item->message ?></p>

                            </div>


                        </div>
                    </div>
                </div>
            <?php
            }
        } else {
            echo "<div class='alert alert-warning'>No Content found</div>";
        }
        echo "</div>";


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
                    <a href="policy.php">Privacy Policy</a>
                    <button type="submit" class="btn btn-warning" name='contact'>Send</button>
                </form>
            </div>
<?php
        }
    } else {
        echo "<div class='alert alert-danger'>Error: $connection->error</div>";
    }
    echo "</div>";
}
?>

<?php
view_counter($connection);

// footer 
Here($current_tab);
include_once "./component/footer.php";
?>
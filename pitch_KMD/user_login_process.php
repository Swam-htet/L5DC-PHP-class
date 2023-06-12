<?php
session_start();
?>

<?php include "./component/header.php" ?>

<?php


    include "./config/config.php";

$tbName = "userINFO";
$connection = new mysqli($host, $username, $password, $dbName);


if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}

$data = json_decode(json_encode($_POST), false);


$sql = "SELECT * FROM $tbName WHERE userName='$data->userName' AND password='$data->password'";

$result = $connection->query($sql);
if ($result) {
    $no_of_row = $result->num_rows;

    if ($no_of_row == 0) {
        echo "Login failed.";
    } else {

        // assign session
        $_SESSION['username'] = $data->userName;

        if ($data->userName == "admin") {
            echo "Administrator Login Successful";
            echo "</br>";
            echo "<a href='./pitch_display.php'>Camping List</a>";
            echo "</br>";
            echo "<a href='./pitch_register.php'>Camping Regsiter</a>";
            echo "</br>";
            echo "<a href='./pitch_search.php'>Search Camping</a>";

        } else {
            echo "Visiter Login Successful";
            echo "</br>";
            echo "<a href='./pitch_display.php'>Camping List</a>";
            echo "</br>";
            echo "<a href='./pitch_search.php'>Search Camping</a>";
        }
    }
} else {
    echo "<div> User registration failed : " . $connection->error . "</div>";
}
?>

<?php include "./component/footer.php" ?>

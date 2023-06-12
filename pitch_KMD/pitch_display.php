<?php session_start() ?>

<?php include "./component/header.php" ?>

<?php
include "./config/config.php";
$connection = new mysqli($host, $username, $password, $dbName);

if ($connection->connect_error) {
    $error_message = $connection->connect_error;
    error_log("Connection error >> $error_message");
}

$tbName = "pitchINFO";

// username from session 
$session_user = $_SESSION['username'];

$sql = "SELECT * FROM $tbName";

$result = $connection->query($sql);

if ($result) {

    // count the number of user
    $num_pitch = $result->num_rows;
    echo "<h5>Total Number of Pitch : $num_pitch </h5>";

    //  display flex wrep
    echo "<div";

    if ($result && $num_pitch > 0) {
        while ($item = $result->fetch_assoc()) {
            $item = json_decode(json_encode($item), false);
            echo "<div>
                Pitch Name : $item->pname </br>
                Pitch address : $item->address </br>
                Pitch location : $item->location </br>
                Pitch photo : $item->photo </br>
                Pitch general : $item->general </br>
                Pitch country : $item->country </br>
                Pitch id : $item->id </br>";


            // session check 
            if ($session_user == "admin") {
                echo "<a href='./pitch_delete.php?id=" . $item->id . "'>Delete</a>";
                echo "</br>";
                echo "<a href='./pitch_delete.php?id=" . $item->id . "'>Delete</a>";
                echo "</br>";

                echo "<a href='./pitch_update.php?id=" . $item->id . "'>Update</a>";
                echo "</br>";
            }

            echo "</div>";
            echo "</br>";
        }
    } else {
        echo "No pitch found";
    }
    echo "</div>";
} else {
    echo "Error :" . $connection->error;
}



?>
<?php
echo "<a href='./user_logout.php'>Logout</a>
"
?>
<?php include "./component/footer.php" ?>
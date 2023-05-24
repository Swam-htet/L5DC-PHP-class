<?php 

session_start();
$session_user = $_SESSION['username'];

include './component/header.php';

include './config/config.php';

// post data
$data = json_decode(json_encode($_POST), false);

// db config 
$tbName = "pitchINFO";
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}


$sql = "SELECT * FROM $tbName where $data->type = '$data->value'";
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
                echo "<br>";
                echo "<a href='./pitch_update.php?id=" . $item->id . "'>Update</a>";

            }

            echo "</div> </br></br>";
        }
    } else {
        echo "No pitch found";
    }
    echo "</div>";
} else {
    echo "Error :" . $connection->error;
}


?>
<?php include './component/footer.php' ?>
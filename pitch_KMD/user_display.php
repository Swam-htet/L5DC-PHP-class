<?php include "./component/header.php" ?>
<?php


include "./config/config.php";

$connection = new mysqli($host, $username, $password, $dbName);

$tbName = "userINFO";

if ($connection->connect_error) {
        die("Connection Error : " . $connection->connect_error);
}

$sql = "select * from $tbName";

// select * from user
$list = $connection->query($sql);

if ($list) {

        // count the number of user
        $num_user = $list->num_rows;
        echo "<h5>Total Number of User : $num_user </h5>";

        //  display flex wrep
        echo "<div class='d-flex flex-wrap'>";

        if ($list && $num_user > 0) {
                // Loop through the rows and access the data
                while ($item = $list->fetch_assoc()) {
                        var_dump($item);
                        echo "</br></br>";
                }
        } else {
                echo "No user found";
        }
        echo "</div>";
} else {
        echo "Error :" . $connection->error;
}

?>

<?php include "./component/footer.php" ?>
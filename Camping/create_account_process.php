<? include './config/config.php'; 
$data = json_decode(json_encode($_POST), false);
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    // die("Connection Error : " . $connection->connect_error);
}

$sql = "INSERT INTO `user` (`firstName`, `lastName`, `email`, `password`, `phoneNumber`) VALUES ('$data->firstName', '$data->lastName', '$data->email', '$data->password', '$data->phoneNumber');";

$result = $connection->query($sql);

if ($result) {
    echo "registration Successful";
} else {
    echo "Error : " . $connection->error;
}

?>
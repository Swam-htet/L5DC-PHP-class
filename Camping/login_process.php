<? include_once './config/config.php';?>
<?php 
    $data = json_decode(json_encode($_POST), false);
    var_dump($data);
    

    $connection = new mysqli($host,$username,$password,$dbName);
    if ($connection->connect_error) {
        die("Connection Error : " . $connection->connect_error);
    }
    
    
    // $sql = "";
    // $result = $connection->query($sql);

?>
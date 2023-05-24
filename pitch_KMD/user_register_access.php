<?php include "./component/header.php" ?>
<?php


include "./config/config.php";
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}

$tbName = "userINFO";


$data = json_decode(json_encode($_POST), false);


// password and confirm password
if ($password == $confirm_password) {


    // check duplicated username
    $existed_check = "select * from $tbName where userName = '$data->userName'";

    $result = $connection->query($existed_check);
    if ($result == true) {

        $duplicated_user = $result->num_rows;

        // no duplicated user
        if ($duplicated_user == 0) {

            $sql = "INSERT INTO $tbName 
                    (firstName,lastName,userName,password,phone,email,country,remark) 
                    VALUES('$data->firstName','$data->lastName','$data->userName','$data->password','$data->phone','$data->email','$data->country','$data->remark');";

            if ($connection->query($sql)) {
                echo "User registration is successful.";
            } else {
                echo "User registration failed : " . $connection->error;
            }
        } else {
            echo "Username is already existed.";
        }
    } else {
        echo "User registration failed : " . $connection->error;
    }
} else {
    //     check password with confirm-password
    echo "Check your password again.";
}

?>
<?php include "./component/footer.php" ?>
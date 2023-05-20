<?php include "./component/header.php" ?>
<?php


include "./config/config.php";


$tbName = "User";

if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}

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
                echo "<div class='alert alert-success m-5'> User registration is successful.</div>";
            } else {
                echo "<div class='alert alert-danger m-5'> User registration failed : " . $connection->error . "</div>";
            }
        } else {
            echo "<div class='alert alert-danger m-5'> Username is already existed.</div>";
        }
    } else {
        echo "<div class='alert alert-danger m-5'> User registration failed : " . $connection->error . "</div>";
    }
} else {
    //     check password with confirm-password
    echo "<div class='alert alert-warning m-5'> Check your password again.</div>";
}

?>
<?php include "./component/footer.php" ?>
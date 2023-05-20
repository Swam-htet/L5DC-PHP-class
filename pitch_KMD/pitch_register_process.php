<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pitch Information</title>
</head>

<body>
    <?php

    include("./config/config.php");


    if(!$connection){
        $error_message = mysqli_connect_errno();
        error_log("Connection error >> $error_message");
    }
    $data = $_POST;
    var_dump("This is post input >> $data");

    // data from pitch register
    $pname = trim($_POST['pname']);
    $location = trim($_POST['location']);
    $address = trim($_POST['address']);
    $general = trim($_POST['general']);
    $country = $_POST['country'];



    // // photo copy and save path to the db
    // $photo_name = $_FILES['photo']['name'];

    // $path = "photos/" . $photo_name;

    // $copied = copy($_FILES['photo']['tmp_name'], $path);

    // if ($copied) {
    //     echo "Photo uploaded";
    // }

    // // duplicated check 
    // $sql_existing_name = "Select * from pitch_info where pitch_name='$pname' ";

    // $result = mysqli_query($connection, $sql_existing_name);

    // $num_rows = mysqli_num_rows($result);

    // // if no duplicated pitch 
    // if ($num_rows == 0) {

    // save to the db
    $sql = "insert into pitch_info(pitch_name,location,address,general_info,photo, country) 
                        values('$pname', '$location', '$address','$general','$path','$country')";

    if (mysqli_query($connection, $sql))
        // successful
        echo "Pitch registration successed.";

    else {
        // error in saving 
        echo "Error  registrarion";
    }
    // } else {
    //     // duplicated condition 
    //     echo "This username is already Exist!";
    // }

    ?>
</body>

</html>
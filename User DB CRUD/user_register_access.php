<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration Access</title>


    <!-- Optional theme -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
    <?php

    // config
    $host = "localhost";
    $username = "root";
    $password = "";
    $dbname = "userdb";
    $tbName = "user";

    //connection
    $connection = mysqli_connect($host, $username, $password, $dbname);

    // post data
    $firstName = $_POST['firstName'];
    $lastName = $_POST['lastName'];
    $userName = $_POST['userName'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm-password'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $country = $_POST['country'];
    $remark = $_POST['remark'];



    //echo "First name -> " . $first_name."  Last name -> ".$last_name."  password -> ".$password."  email-> ".$email."  phone ->".$phone."  country -> ".$country. "  Remark -> ".$remark;

    // password and confirm password
    if ($password == $confirm_password) {


        // check duplicated username
        $existed_check = "select * from $tbName where userName = '$userName'";

        $result = mysqli_query($connection, $existed_check);
        if ($result) {

            $duplicated_user = mysqli_num_rows($result);

            if ($duplicated_user == 0) {

                $sql = "insert into $tbName (firstName,lastName,userName,password,phone,email,country,remark) values('$firstName','$lastName','$userName','$password','$phone','$email','$country','$remark');";

                if (mysqli_query($connection, $sql)) {
                    echo "<div class='alert alert-success m-5'> User registration is successful.</div>";
                } else {
                    echo "<div class='alert alert-danger m-5'> User registration failed.</div>";
                }
            } else {
                echo "<div class='alert alert-danger m-5'> Username is already existed.</div>";
            }
        } else {
            echo "<div class='alert alert-warning m-5'> Error </div>";
        }
    } else {
        //     check password with confirm-password
        echo "<div class='alert alert-warning m-5'> Check your password again.</div>";
    }




    ?>
</body>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
<?php
// connection and connection check 
include "./config/config.php";
$tbName = "user";
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}


// component import 
include_once "./component/header.php";
include_once './component/navbar.php';


?>
<?php
if (isset($_POST["submit"])) {

    $data = json_decode(json_encode($_POST), false);

    // password and confirm password
    if ($data->password === $data->confirmPassword) {

        // check duplicated username
        $existed_check = "select * from $tbName where email = '$data->email'";

        $result = $connection->query($existed_check);
        if ($result) {
            $duplicated_user = $result->num_rows;

            // no duplicated user
            if ($duplicated_user == 0) {

                $sql = "INSERT INTO $tbName 
                    (firstName,lastName,email,password,phoneNumber) 
                    VALUES('$data->firstName','$data->lastName','$data->email','$data->password','$data->phoneNumber');";

                if ($connection->query($sql)) {
                    echo "User registration is successful.";
                } else {
                    echo "User registration failed : " . $connection->error;
                }
            }
            // duplicated user
            else {
                echo "Username is already existed.";
            }
        }
        // registration failed
        else {
            echo "User registration failed : " . $connection->error;
        }
    }
    //     check password with confirm-password
    else {
        echo "Check your password again.";
    }
}
?>

<?php
// list for navbar 
$list = array(
    array('name' => 'Home', 'link' => "index.php"),
    array('name' => 'Information', 'link' => "information.php"),

);

// current tab
$current_tab = "Register";


// header
header_function($current_tab);

// navbar 
navbar_function($list);

?>


<!-- register  -->
<div class="container">
    <h2 class="text-center m-2">Account Register </h2>

    <div class="row">
        <form action="<?php echo $_SERVER['PHP_SELF'] ?>" method="post">

            <div class='m-b-3'>
                <label class="form-text m-b-2" for="emai">First Name : </label>
                <input type="text" name="firstName" id="firstName" class="form-control"
                    placeholder="Enter your first name here">
            </div>
            <div class='m-b-3'>
                <label class="form-text m-b-2" for="emai">Last Name : </label>
                <input type="text" name="lastName" id="lastName" class="form-control"
                    placeholder="Enter your last name here">
            </div>
            <div class='m-b-3'>
                <label class="form-text m-b-2" for="emai">Email : </label>
                <input type="text" name="email" id="email" class="form-control" placeholder="Enter your email here">
            </div>
            <div class='m-b-3'>
                <label class="form-text m-b-2" for="phoneNumber">Phone Number : </label>
                <input type="text" name="phoneNumber" id="phone Number" class="form-control"
                    placeholder="Enter your phone number here">
            </div>
            <div class='m-b-3'>
                <label class="form-text m-b-2" for="password">Password : </label>
                <input type="password" name="password" id="password" class="form-control"
                    placeholder='Enter your password here'>
            </div>
            <div class='m-b-3'>
                <label class="form-text m-b-2" for="confirmPassword">Confirm Password : </label>
                <input type="password" name="confirmPassword" id="confirmPassword" class="form-control"
                    placeholder='Enter your password again'>
            </div>
            <div></div>

            <a href="login.php">Back to Login Page</a>
            <button type="submit" class="btn btn-warning" name='submit'>Register Here</button>
        </form>
    </div>
</div>





<?php

// footer 
include_once "./component/footer.php";
?>
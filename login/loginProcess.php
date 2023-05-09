<?php 
   
    // $firstName = $_POST["firstName"];
    // $lastName = $_POST["lastName"];
    // $email = $_POST["email"];
    // $password = $_POST["password"];
    // $gender = $_POST["gender"];
    // $country = $_POST["country"];

    // echo "Username : ".$firstName." ".$lastName."<br>";
    // echo "Email : ".$email."<br>";
    // echo "Gender : " . $gender . "<br>";
    // echo "Password : " . $password . "<br>";
    // echo "Country : " . $country . "<br>";

    // input data array
    $list = $_POST;
    print_r("This is Username >> " . $list["userName"] . "<br>");
    print_r("This is Password >> ".$list["password"]);


?>
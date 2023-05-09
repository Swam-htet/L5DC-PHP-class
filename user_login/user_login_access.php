<?php 
    // default GET method
    // create associated array with input tag property with name 
    // input:name as key and value as input.value 
    $firstName = $_POST["firstName"];
    $lastName = $_POST["lastName"];
    $email = $_POST["email"];
    $password = $_POST["password"];
    $gender = $_POST["gender"];
    $country = $_POST["country"];

    echo "Username : ".$firstName." ".$lastName."<br>";
    echo "Email : ".$email."<br>";
    echo "Gender : " . $gender . "<br>";
    echo "Password : " . $password . "<br>";
    echo "Country : " . $country . "<br>";

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example Two</title>

    <!-- Optional theme -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">


</head>

<body>
    <?php

    // array example 
    $list = array("here", "bodyOne", "i am here", "none", "alphar","body");

    // sorting array 
    sort($list);

    // list rendering with for each 
    foreach($list as $item) {
        echo "<li class='text-warning'>$item</li> </br>";
    }

    // associated array 
    $team = array("Developer" => "Kyaw Gyi","Designer"=>"Zaw Gyi","Project Manager"=>"Htet Htet");
    function display_array($list){
        // associated array rendering 
        foreach ($list as $role => $name) {

        echo "$name => is worked as => $role <br>";
        }
    }

    display_array($team);

    // sorting the associated array 
    // asort() and arsort() => sorting by using value 
    // ksort() and krsort() => sorting by using key 

    ksort($team);

    echo "<br>";

    display_array($team);









    ?>
</body>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>


</html>
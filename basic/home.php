<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Index Page</title>

    <link rel="stylesheet" href="../../../node_modules/bootstrap/dist/css/bootstrap.min.css">
    <style>
        .button_click {
            margin: 20px;
            background-color: orange;
            padding: 10px;
            border-radius: 20px;
            
        }
        .yes:hover{
            background-color: green;

        }

        .no:hover {
            background-color: red;
        }
    </style>
</head>

<body>
    <h1>This is index Page</h1>
    <?php

    // 4 ways of variable naming conversions 

    // camel case 
    $myName = "Swam Htet";

    // pascal case 
    $MyAge = 21;

    // snake case 
    $my_address = "Somewhere";

    
    echo "This is index page from php <br> <hr>";
    echo "Ma Ma ko Chit tal :)<br> Chit mar lar? <br>";
    echo "<button class='button_click yes'>Chit tal </button><button class = 'button_click no'>Chit Boo </button> <br>";


    $numberOne = 1000;
    $numberTwo = 500;
    $result = $numberOne - $numberTwo;

    
    // echo 
    echo "This is final result >> ".$numberOne+$numberTwo."<br><br>";

    echo "This is selectiion statement >> ";
    if($result<200) echo "True condition ";
    else echo "False condition ";
    
    ?>

    <form action="" method="get">
        <label for="name">Enter your name : </label>
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <br>
        <button type="submit">Submit Here</button>
    </form>
</body>
</html>
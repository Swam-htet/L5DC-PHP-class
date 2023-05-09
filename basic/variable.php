<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Variable</title>


</head>
<body>
    <h1>Kinds of variable in php</h1>
    <ul>
        <li>integer</li>
        <li>string</li>
    </ul>

    <?php 
    // variable declaration and assigning values 
    $num = 20;
    echo "This is number >> $num </br>";

    // type of integer in php 
    // decimal 
    // octal start with 0 
    // hax start with 0x 
    // binary start with 0b
    // floating point number 

    $floatNumber = 2.90;

    // using is_float() function to check float or not 
    echo "$floatNumber is float number ?  ",is_float($floatNumber);

    // string 
    // -- single => ''
    // -- double => "" 
    // string interpolation is only for double 
    $name = "Hello world";
    echo "</br>$name is string interpolation.</br>";
    echo '$name is string interpolation.</br>';

    // using is_string() to check string or not 
    echo "$name is string or not > ".is_string($name);

    // falsey values 
    // string "" '' 
    // false 
    // integer 0
    // float 0.0
    // array with zero element 
    // an object with not property or method 
    // null value 

    // name is truthy value 
    if($name){
        echo "This is true condition";
        }
        else{
        echo "This is false condition";
        }

    // using is_bool() to check is boolean or not 

    // array 
    // normal array 
    $person = array("Edison", "Wankel", "Crapper");

    // associated array 
    $creator = array(
        'Light bulb' => "Edison",
        'Rotary Engine' => "Wankel",
        'Toilet' => "Crapper"
    );

    // sort($person);
    // asort($creater);

    // using foreach looping for array 
    foreach ($person as $value) {
        echo " <li> $value </li>";
    }

    foreach ($creator as $invention => $inventor){
        echo "<li>$invention => $inventor</li>";
    }

    function turn_to_hash($input){
        return md5($input);
    }

    echo "This is hashing the string >> ".turn_to_hash("Hello world");

    $fruits = array("lemon", "orange", "banana", "apple");
    sort($fruits);
    foreach ($fruits as $key => $val) {
        echo "</br>fruits[" . $key . "] = " . $val ;
    }


    ?>
</body>
</html>
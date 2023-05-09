<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Example One</title>
</head>

<body>
    <h1>This is example one</h1>

    
    <!-- this is even or odd  -->
    <?php
    function check_even_odd($var = null)
    {
        # code...
        if($var != null){
            if ($var % 2 == 0) {
                return "$var is even";}
            else{
                return "$var is odd";
            }
        }
        else{
            return "No parameter input";
        }
    }
    $num = 1003;
    $output = check_even_odd($num);
    echo "This is the result >> $output</br>";
    
    ?>
</body>

</html>
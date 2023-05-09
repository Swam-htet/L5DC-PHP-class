<html>
<?php
$value = "20";
echo "$value<br>";
$age = (float) $value;
echo "$age<br>";

echo " " . gettype($age);

class Person
{
    var $name = "Fred";
    var $age = 35;
    function display()
    {
        return 0;
    }
    var $job = "Developer";
}
$o = new Person;
$a = (array) $o;
print_r($a);

if ($o) :
    echo "Welcome!";
    $state = 1;
else :
    echo "Access Forbidden!";
    exit;
endif;

// function display()
// {
//     if (func_num_args() == 0) {
//         echo "Nothing inside the array";
//     } else {
//         for ($i = 0; $i < func_num_args(); $i++) {
//             echo "This is -> " . func_get_args($i) . "</br>";
//         }
//     }
// }
// display(2, 3, 4, 5);

function countList()
{
    if (func_num_args() == 0) {
        return false;
    } else {
        $count = 0;
        for ($i = 0; $i < func_num_args(); $i++) {
            $count += func_get_arg($i);
        }
        return $count;
    }
}
$restult = countList(20, 30, 40);
echo "This is result " . countList();

?>

</html>
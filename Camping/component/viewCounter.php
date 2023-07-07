<?php

function view_counter($connection)
{

    if (!empty($_SERVER['HTTP_CLIENT_IP'])) {
        //ip from share internet
        $ip = $_SERVER['HTTP_CLIENT_IP'];
    } elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {
        //ip pass from proxy
        $ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
    } else {
        $ip = $_SERVER['REMOTE_ADDR'];
    }



    $qry = "SELECT * FROM visitedip WHERE ip = '$ip'";
    $result = $connection->query($qry);
    $num = $result->num_rows;

    if ($num == 0) {
        $qry3 = "INSERT INTO visitedip(ip) VALUES ('$ip')";
        $connection->query($qry3);

        $qry1 = "SELECT * FROM counter WHERE id = 0";
        $result1 = $connection->query($qry1);

        $row1 = $result->fetch_assoc();
        var_dump($row1);
        $count = $row1['count'];
        $count = $count + 1;

        $qry2 = "UPDATE counter SET count='$count' WHERE id=0";
        $result2 = $connection->query($qry2);
    } else {
        $qry1 = "SELECT * FROM counter WHERE id = 0";
        $result1 = $connection->query($qry1);
        $row1 = $result1->fetch_assoc();
        $count = $row1['count'];
    }

    $numlength = strlen((string)$count);
    $count;
    $stri = (string)$count;
    echo "<p class='p-2'>Unique Visit Counter : " . $stri . "</p>";
}

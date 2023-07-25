<?php





header("Content-type: text/xml");



echo "<?xml version='1.0' encoding='UTF-8'?>
          <rss version='2.0'>
            <channel>
                <title>Global Wild Swimming and Camping</title>
                <description>Global Wild Swimming and Camping provides camping and swimming information for visitors.</description>
                <link>http://localhost:3001/l5dc/L5DC-PHP-class/Camping/index.php</link>";



$sql = "select * from rssfeed order by id desc";

include "./config/config.php";

$connection = new mysqli($host, $username, $password, $dbName);

if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}
$tbName = "camp";

$result = $connection->query($sql);


$num_rows = $result->num_rows;



while ($item = $result->fetch_assoc()) {
    echo "<item>";



    echo "<title>" . $item['title'] . "</title>";
    echo "<description>" . $item['description'] . "</description>";
    echo "<link>" . $item['link'] . "</link>";



    echo "</item>";
}





echo "</channel></rss>";

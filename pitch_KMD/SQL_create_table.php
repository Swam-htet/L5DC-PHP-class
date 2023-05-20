<?php include "./component/header.php"; ?>
<?php
include "./config/config.php";

// query in string
$sql = "create table $tbname
            (id int primary key auto_increment, 
            pname varchar(255) not null, 
            location text not null,
            address varchar(255) not null, 
            photo_name varchar(255) not null,
            general varchar(255) not null, 
            country varchar(255) not null, 
            remark text null)";

// query
if (mysqli_query($connection, $sql)) {
    echo "Table is created.";
} else {
    echo "Error";
}

?>


</body>

</html>
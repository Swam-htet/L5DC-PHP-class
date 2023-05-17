<html lang="en">

<head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Search User</title>


        <!-- Optional theme -->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
        <?php

        // config
        $host = "localhost";
        $username = "root";
        $password = "";
        $dbname = "userdb";
        $tbName = "user";

        //connection
        $connection = mysqli_connect($host, $username, $password, $dbname);

        // search character
        $$search_value = $_POST("value");
        $attribute = $_POST("attribute");

        // search user whose name include search char
        $sql = "select * from $tbName where '$attribute' like '%value%'";

        // select * from user
        $list = mysqli_query($connection, $sql);

        // count the number of user
        $num_user = mysqli_num_rows($list);

        echo "<div class='alert alert-warning m-5'>Number of search user - $num_user</div>";

        for ($i = 1; $i <= $num_user; $i++) {
                $item = mysqli_fetch_assoc($list);

                echo "<div class='card m-3' style='width: 30rem;'>
            <div class='card-body'>
                 <h5 class='card-title' style='font-size: 12px'> User ID -> " . $item['id'] . "</h5>
                 <h5 class='card-title' style='font-size: 12px'> Username -> " . $item['first_name'] . " " . $item['last_name'] . "</h5>
                 <h5 class='card-title' style='font-size: 12px'> Email -> " . $item['email'] . "</h5>
                 <h5 class='card-title' style='font-size: 12px'> Phone Number -> " . $item['phone'] . "</h5>
                 <h5 class='card-title' style='font-size: 12px'> Country -> " . $item['country'] . "</h5>
            </div>
          </div>";
        }


        ?>
</body>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
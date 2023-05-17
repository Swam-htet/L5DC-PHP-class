<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">


    <!-- Optional theme -->
    <link href="./../node_modules/bootstrap/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

    <!-- user input form -->
    <form class="w-50 p-5 bg-secondary bg-opacity-10 m-5 rounded" action="search_user_access.php" method="POST">
        <h1 class="m-2">User Login</h1>


        <?php
        $attribute_list = array(
            'First Name' => 'first_name',
            'Last Name' => 'last_name',
            'Username' => 'user_name',
            'Email' => 'email',
            'Country' => 'country'
        );
        ?>
        <!-- type of column -->
        <div id="column" class="m-2">
            <label for="value" class="form-label">Type of Column : </label>
            <select class='form-select'>
                <option>Choose Type of Column</option>
                <?php
                foreach ($attribute_list as $key => $value) {
                    echo "<option value ='$value'> $key </option>";
                }
                ?>
            </select>

        </div>

        <!-- search value -->
        <div id="value" class="m-2">
            <label for="value" class="form-label">Search : </label>
            <input type="text" name="value" class="form-control" id="password">
        </div>

        <!-- search button -->
        <input type="submit" class="btn btn-warning m-2" value="Search Here"/>
    </form>

</body>


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
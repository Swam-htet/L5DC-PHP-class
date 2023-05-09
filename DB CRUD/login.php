<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Demo</title>


    <!-- Optional theme -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>

<!-- user input form -->
<form class="w-50 p-5 bg-secondary bg-opacity-10 m-5 rounded" action="user_login_access.php" method="POST">
    <h1 class="m-2">User Login</h1>


    <!-- username -->
    <div id="user_name" class="m-2">
        <label for="userName" class="form-label">Username : </label>
        <input type="text" name="userName" class="form-control" id="username">
    </div>

    <!-- password -->
    <div id="password" class="m-2">
        <label for="password" class="form-label">Password : </label>
        <input type="password" name="password" class="form-control" id="password">
    </div>

    <!-- submit button -->
    <input type="submit" class="btn btn-primary m-2" value="Submit Here"/>
</form>

</body>


<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4" crossorigin="anonymous"></script>

</html>
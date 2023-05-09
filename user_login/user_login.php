<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Demo</title>


    <!-- Optional theme -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-rbsA2VBKQhggwzxH7pPCaAqO46MgnOM80zW1RWuH61DGLwZJEdK2Kadq2F9CUG65" crossorigin="anonymous">

</head>

<body>
<!-- form input by using form tag in html with action php -->
<!-- action propery for php file path -->
<form class="w-50 p-5 bg-secondary bg-opacity-10 m-5 rounded" action="user_login_access.php" method="POST">

    <h1>User Login</h1>


    <!--        first name-->
    <div class="m-1">
        <!-- first name input  -->
        <label for="firstName" class="form-labe" l>First Name : </label>
        <input type="text" name="firstName" id="firstName" class="form-control">
    </div>

    <!--        last name -->
    <div class='m-1'>
        <!-- Last name input -->
        <label for="lastName" class="form-label">Last Name : </label>
        <input type="text" name="lastName" id="lastName" class="form-control">
    </div>


    <!--         password -->
    <div class="m-1">
        <label for="password" class="form-label"> Password : </label>
        <input type="password" name="password" id="password" class="form-control">
    </div>


    <button type="submit" class="btn btn-warning m-3" name="submit">Submit Here</button>
</form>

</body>

<!-- Latest compiled and minified JavaScript -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-kenU1KFdBIe4zVF0s0G1M5b4hcpxyD9F7jL+jjXkk+Q2h455rYXK/7HAuoJl+0I4"
        crossorigin="anonymous"></script>

</html>
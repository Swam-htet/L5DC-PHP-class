<?php include "./component/header.php" ?>
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
    <input type="submit" class="btn btn-warning m-2" value="Submit Here" />
</form>
<?php include "./component/footer.php" ?>
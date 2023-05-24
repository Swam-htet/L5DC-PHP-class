<?php include "./component/header.php" ?>
<!-- user input form -->
<form action="user_login_process.php" method="POST">
    <h1>User Login</h1>

    <!-- username -->
    <div id="user_name">
        <label for="userName">Username : </label>
        <input type="text" name="userName" id="username">
    </div>

    <!-- password -->
    <div id="password">
        <label for="password">Password : </label>
        <input type="password" name="password" id="password">
    </div>

    <!-- submit button -->
    <input type="submit" value="Submit Here" />
</form>
<?php include "./component/footer.php" ?>
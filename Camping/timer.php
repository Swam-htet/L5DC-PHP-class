<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Timer</title>
</head>

<body>

    <h1>Login is blocked!</h1>
    <div id='timer'></div>

    <script type="text/javascript">
    var today = new Date();
    var month = new Date().getMonth() + 1;
    var day = new Date().getDate();
    var year = new Date().getFullYear();


    var hr = new Date().getHours();
    var min = new Date().getMinutes() + 10; //10 minutes
    var sec = new Date().getSeconds() + 1;


    var time = hr + ":" + min + ":" + sec;
    var preTime = new Date(month + " " + day + ", " + year + " " + time).getTime();

    var x = setInterval(function() {


        var current_time = new Date().getTime();


        var diffTime = preTime - current_time;

        var minutes = Math.floor((diffTime % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((diffTime % (1000 * 60)) / 1000);


        document.getElementById("timer").innerHTML = "<h1>" + minutes + ":" + seconds + "</h1>";

        if (diffTime < 0) {
            clearInterval(x);

            document.getElementById("timer").innerHTML = "<?php session_destroy(); ?>";

            window.location = "login.php";
        }



    }, 1000); //1 sec
    </script>


</body>

</html>
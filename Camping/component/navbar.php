<?php


function navbar_function($list)
{

    session_start();
    $session_user = $_SESSION['session_user'];
    echo "<div class='container-fluid bg-warning'>
            <div class='container'>
                <nav class='navbar row p-1'>
                    <a href='index.php' class='navbar-brand '>
                        <i class='m-e-5'>BrandLOGO</i>
                    </a>
                   
                    <ul class='row'>";
    foreach ($list as $item) {
        echo "<li class='navbar-item m-s-5'><a href='$item[link]' class='navbar-link'>$item[name]</a></li>";
    }
    // login and logout button 
    if ($session_user == "Admin" || $session_user == "User") {
        if ($session_user == "Admin") {

            echo "<li class='navbar-item m-s-5'><a href='camp_register.php' class='navbar-link'>Camp Register</a></li>";
            echo "<li class='navbar-item m-s-5'><a href='all_user.php' class='navbar-link'>User</a></li>";
        }
        echo "<li class='navbar-item m-s-5'><a href='all_contact.php' class='navbar-link'>Contact</a></li>";
        echo "<li class='navbar-item m-s-5'><a href='all_review.php' class='navbar-link'>Review</a></li>";
        echo "<li class='navbar-item m-s-5'><a href='all_booking.php' class='navbar-link'>Booking</a></li>";
        echo "<li class='navbar-item m-s-5'><a href='logout.php' class='navbar-link'>LogOut</a></li>";
    } else {
        echo "<li class='navbar-item m-s-5'><a href='logIn.php' class='navbar-link'>LogIn</a></li>";
    }
    echo "          </ul>  
                </nav>
                </div>
            </div>";
}

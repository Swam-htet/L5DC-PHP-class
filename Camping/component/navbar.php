<?php


function navbar_function($user, $list)
{
?>
    <div class='container-fluid bg-warning'>
        <div class='container'>
            <nav class='navbar p-1'>
                <a href='index.php' class='navbar-brand m-3'>
                    <i class='m-e-5'>GWSC</i>
                </a>
                <ul class="topnav" id="myTopnav">
                    <?php
                    foreach ($list as $item) {
                        echo "<li class='navbar-item m-s-5'><a href='$item[link]' class='navbar-link'>$item[name]</a></li>";
                    }
                    ?>
                    <?php
                    // login and logout button 
                    if ($user == "Admin" || $user == "User") {

                        //  admin 
                        if ($user == "Admin") {

                            echo "<li class='navbar-item m-s-5'><a href='camp_register.php' class='navbar-link'>Camp Register</a></li>";
                            echo "<li class='navbar-item m-s-5'><a href='all_user.php' class='navbar-link'>Users</a></li>";
                        }

                        // user 
                        echo "<li class='navbar-item m-s-5'><a href='all_contact.php' class='navbar-link'>Contacts</a></li>";
                        echo "<li class='navbar-item m-s-5'><a href='all_booking.php' class='navbar-link'>Bookings</a></li>";
                        echo "<li class='navbar-item m-s-5'><a href='logout.php' class='navbar-link'>LogOut</a></li>";
                    }
                    // no user 
                     else {
                        echo "<li class='navbar-item m-s-5'><a href='logIn.php' class='navbar-link'>LogIn</a></li>";
                    }
                    echo "<li id='google_translate_element' class='navbar-item m-s-5'></li>";
                    ?>
                    <li class='navbar-item m-s-5'>
                    <a href="javascript:void(0);" class="icon" onclick="myFunction()">
                        <img src="./src/icon/nav.png" alt="nav-icon">
                    </a>
                </li>


                </ul>
            </nav>

        </div>
    </div>
    <!-- alert box -->
    <div class='alert-box'></div>
<?php }
?>
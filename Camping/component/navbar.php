<?php

function navbar_function($list)
{
    echo "<div class='container'>
                <nav class='row p-1'>
                    <a href='#' class='navbar-brand'>
                        <i class='m-e-5'>Brand Logo</i>
                    </a>
                   
                    <ul class='row'";
    foreach ($list as $item) {
        echo "<li class='navbar-item m-s-3'><a href='$item[link]' class='navbar-link'>$item[name]</a></li>";
    }
    echo "          </ul>   
                </nav>
            </div>";
}

?>

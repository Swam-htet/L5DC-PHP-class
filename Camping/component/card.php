<?php

function Booking_card($data, $user_level)
{
?>
    <div class='container p-1'>
        <div class='card bg-light'>
            <h4 class='m-b-1'>Booking ID : <?php echo $data->id ?></h4>
            <p class='m-b-1'>Number of Premium Room : <?php echo $data->no_premium ?></p>
            <p class='m-b-1'>Number of Improved Room : <?php $data->no_improved ?> </p>
            <p class='m-b-1'>Number of Standard Room : <?php $data->no_standard ?></p>

            <?php
            if ($user_level == "Admin") {
                echo "<p class='m-b-1'>From User ID: <?php echo $data->user_id ?></p>";
            }
            ?>
            <p class='m-b-1'>Booking Date: <?php echo $data->date ?> </p>
            <p class='m-b-1'>Number of Day : <?php echo $data->no_day ?></p>
            <p class='m-b-1'>To Camp ID: <?php echo $data->camp_id ?> </p>
        </div>
    </div>
<?php
}


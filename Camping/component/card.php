<?php
function Camp_card($data)
{
    echo "<div class='card p-3 m-2 bg-light'>
                <div class='card-header'>
                    <h3>$data->name</h3>
                </div>
                <div class='card-body'>
                    <img src='./src/carousel_one.jpeg' alt='camp profile'>
                </div>
                <div class='card-footer'>";
}


function Booking_card($data, $user_level)
{
    echo "<div class='container p-1'>
            <div class='card bg-light'>
                <h4 class='m-b-1'>Booking ID : $data->id</h4>
                <p class='m-b-1'>Number of Premium Room : $data->no_premium</p>
                <p class='m-b-1'>Number of Improved Room : $data->no_improved</p>
                <p class='m-b-1'>Number of Standard Room : $data->no_standard</p>";

    if ($user_level == "Admin") {
        echo "<p class='m-b-1'>From User ID: $data->user_id </p>";
    }
    echo "      <p class='m-b-1'>Booking Date: $data->date </p>
                <p class='m-b-1'>Number of Day : $data->no_day </p>
                <p class='m-b-1'>To Camp ID: $data->camp_id </p>
            </div>
    </div>";
}

function User_card($data)
{
    echo "<div class='container p-2'>
        <div class='card bg-light'>
            <h4 class='m-b-1'>User's ID : $data->Id</h4>
            <p class='m-b-1'>Username : $data->firstName $data->lastName</p>
            <p class='m-b-1'>User's Email : $data->email</p>
            <p class='m-b-1'>Phone Number : $data->phoneNumber </p>
        </div>
    </div>";
}

function Contact_card($data, $user_level)
{
    echo "<div class='container p-1'>
            <div class='card bg-light'>";
    if ($user_level == "Admin") {
        echo "<p class='m-b-1'>From User ID: $data->user_id </p>";
    }
    echo "      <p class='m-b-1'>To Camp ID: $data->camp_id </p>
                <p class='m-b-1'>Message : $data->message</p>
            </div>
    </div>";
}


function Review_card($data, $user_level)
{
    echo "<div class='container p-1'>
            <div class='card bg-light'>";
    if ($user_level == "Admin") {
        echo "<p class='m-b-1'>From User ID: $data->user_id </p>";
    }
    echo "      <p class='m-b-1'>To Camp ID: $data->camp_id </p>
                <p class='m-b-1'>Rating : $data->point </p>

                <p class='m-b-1'>Review : $data->comment</p>
            </div>
    </div>";
}

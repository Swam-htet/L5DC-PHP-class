<?php
function Camp_card($data)
{
    echo "<div class='card p-2 m-2 bg-light'>
                <div class='card-header'>
                    <h3>$data->name</h3>
                </div>
                <div class='card-body'>
                    <img src='./src/photo/camp.jpeg' alt='camp profile'>
                </div>
                <div class='card-footer'>";
}


function Booking_card($data)
{
    echo "<div class='col-5'>
        <div class='card p-2 m-2 bg-light'>
            <div class='card-header'>
                <h3>Booking ID : $data->id</h3>
            </div>
            <div class='card-footer'>
                <button class='btn btn-warning' id='btn-$data->id' onclick='booking_dropdown_function($data->id)'>Click Here</button>
                <div class='dropdown-box' id='booking-$data->id'>
                    This is dropdown box
                </div>
            </div>
        
        </div>
    </div>
    ";
}
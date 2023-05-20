<?php 
function Card($item){
    return "<div class='col-4'>
    <div class='card m-1 p-2'>
         <h5 class='card-title' style='font-size: 12px'> User ID -> " . $item['id'] . "</h5>
         <h5 class='card-title' style='font-size: 12px'> Full Name -> " . $item['firstName'] . " " . $item['lastName'] . "</h5>
         <h5 class='card-title' style='font-size: 12px'> Username -> " . $item['userName']  . "</h5>
         <h5 class='card-title' style='font-size: 12px'> Email -> " . $item['email'] . "</h5>
         <h5 class='card-title' style='font-size: 12px'> Profile Photo Path -> " . $item['photo'] . "</h5>
         <h5 class='card-title' style='font-size: 12px'> Phone Number -> " . $item['phone'] . "</h5>
         <h5 class='card-title' style='font-size: 12px'> Country -> " . $item['country'] . "</h5>
    </div>
  </div>";
}

?>
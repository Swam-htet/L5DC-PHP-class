<?php
session_start();

$user_id = $_SESSION['session_id'];
if (isset($_SESSION['session_user'])) {
    $session_user = $_SESSION['session_user'];
}


// connection and connection check  
include "./config/config.php";
$connection = new mysqli($host, $username, $password, $dbName);
if ($connection->connect_error) {
    die("Connection Error : " . $connection->connect_error);
}

$tbName = "review";

// component import 
include_once "./component/header.php";
include_once './component/navbar.php';
include_once "./component/card.php";
include_once "./component/here.php";
?>

<?php

// list for navbar 
$list = array(
    array('name' => 'Home', 'link' => "index.php"),
    array('name' => 'Information', 'link' => "information.php"),

);

// current tab 
$current_tab = "Bookings";

// header
header_function($current_tab);

// navbar 
navbar_function($session_user, $list);

?>

<script>
let Display_list = (list, container) => {
    // container for the display item
    let container_div = document.getElementById(container);

    // return the DOM node list
    var domNodes = list.map(function(item) {
        // for display container
        var node = document.createElement("div");

        console.log(item);
        node.classList = `card bg-warning`;
        node.setAttribute("id", `id-${item.id}`);

        // Create a header element (e.g., h2)
        var header = document.createElement("h4");
        header.textContent = "Review " + item.id;

        // Create a paragraph element for the content
        var paragraph = document.createElement("p");
        paragraph.textContent = item.comment;

        // Append the header and paragraph elements to the container
        node.appendChild(header);
        node.appendChild(paragraph);

        return node;
    });
    domNodes.forEach((node) => {
        container_div.appendChild(node);
    });
};
</script>

<div id='show'></div>

<?php
if (!isset($session_user)) {
    echo "<div class='alert alert-danger'>User Only</div>";
} else {
    echo "<div class = 'container'>";

    if ($session_user === "Admin") {

        $sql = "SELECT * from $tbName order by id";
    } // own review for user
    else {
        $sql = "SELECT * from $tbName where user_id = " . $user_id . "";
    }
    $result = $connection->query($sql);

    if ($result) {

        $reviews = $result->num_rows;

        if ($result && $reviews > 0) {
            while ($item = $result->fetch_assoc()) {
                $data_list[] = $item;
            }
        } else {
            echo "<div class='alert alert-warning'>No Booking found</div>";
        }
    } else {
        echo "<div class='alert alert-danger'>Error: $connection->error</div>";
    }
    echo "</div>";
    $json_data = json_encode($data_list);

    echo "<script>
            let list = $json_data;
        </script>";
}
?>


<?php

// footer 
Here($current_tab);
include_once "./component/footer.php";
?>
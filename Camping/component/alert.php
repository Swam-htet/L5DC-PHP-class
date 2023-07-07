<!-- alert function -->
<script>
let alert_js = (log_string, type) => {

    let alert_container = document.querySelector('.alert-box');
    console.log(alert_container);


    console.log("alert function is running");
    // console.log("input para >> ", log_string);


    alert_container.appendChild(createChild(log_string, type));

    setTimeout(() => {
        console.log("alert is closed");
        alert_container.innerHTML = '';
    }, 4000);
};

let createChild = (string, type) => {
    const alert_box = document.createElement("div");

    const node = document.createTextNode(string);

    alert_box.appendChild(node);
    alert_box.classList = `alert alert-${type} h-20 m-1 p-2`;

    // console.log(alert_box);
    return alert_box;


}
</script>

<?php
function alert_function($alert_string, $type)
{
    echo "<script>alert_js(`" . $alert_string . "`,`" . $type . "`)</script>";
}
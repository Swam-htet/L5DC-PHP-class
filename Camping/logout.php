<?php
session_start();

session_destroy();

echo "Logout Successful";

?>
<script>
    window.location = "index.php";
</script>
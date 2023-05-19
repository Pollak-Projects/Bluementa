<?php
include ('user_id.lekerese.php');

$sql = "SELECT quiz_id FROM Questions WHERE registration_id = $_SESSION["id"]";

?>

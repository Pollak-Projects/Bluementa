<?php
include ('user_id.lekerese.php');

// FIXME some error in WHERE clause
$sql = "SELECT quiz_id FROM Questions WHERE registration_id = "$_SESSION["id"]";

?>

<?php
require ('user_id.kerese.php');

$id = "SELECT quiz_id FROM Quizzes WHERE registration_id = $_SESSION["id"]";

?>
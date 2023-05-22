<?php
include($_SERVER['DOCUMENT_ROOT'].'/Bluementa-dev/app/global/database_connection/global_connect.php');

$sql = "SELECT quiz_id, number_of_questions from quizzes where quiz_id = 122";


if ($allResult = mysqli_query($mysqli, $sql)) {
  $result = $allResult->fetch_assoc();
  $kerdesszam = $result["number_of_questions"];
}


mysqli_close($mysqli); 
?>
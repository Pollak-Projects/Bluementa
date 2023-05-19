<?php
include('../global/database_connection/global_connect.php');

// FIXME what is this, WHY
$numberOfQuestions = $_GET["NUMBEROFQUESTIONS"];

$sql = "SELECT quiz_id, number_of_questions from quizzes where quiz_id = " . $numberOfQuestions;


if ($allResult = mysqli_query($mysqli, $sql)) {
  $result = $allResult->fetch_assoc();
  $rowcount = $result["number_of_questions"];
}

mysqli_close($mysqli);

echo json_encode($rowcount);

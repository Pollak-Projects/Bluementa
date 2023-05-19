<?php
require_once("global_connect.php");

$sql = "SELECT MAX(quiz_id) FROM `quizzes`";

$result = $mysqli->query($sql);

$row = $result->fetch_assoc();

$data = intval($row["MAX(quiz_id)"]);

echo json_encode($data);
?>
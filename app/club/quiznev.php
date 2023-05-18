<?php
require_once("global_connect.php");

$quizid = $_POST['quizid'];

$sql = "SELECT `quiz`.`quiz_name`\n"

. "FROM `quiz` WHERE `quiz`.`quiz_id` = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $quizid);
$stmt->execute();

$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $sor = [];
    $sor['Nev'] = $row['quiz_name'];
    $data[] = $sor;
}

echo json_encode($data);
?>
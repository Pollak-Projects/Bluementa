<?php
if(!isset( $_SESSION["id"] )) return http_response_code(400);
require_once("connect.php");

$quizid = $_POST['quizid'];

$sql = "SELECT `quizzez`.`quiz_name`\n"

. "FROM `quizzez` WHERE `quizzez`.`quiz_id` = ?";

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
<?php
// validating user
include(dirname(__FILE__)."../../user/controllers/validate_session.php");
if(!validate_session()) return http_response_code(401);

require_once("global_connect.php");

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
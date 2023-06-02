<?php

// validating user
include(dirname(__FILE__)."../../user/controllers/validate_session.php");
if(!validate_session()) return http_response_code(401);

require_once("global_connect.php");

$csoportid = $_POST['clubid'];
$sql = "SELECT `quizzez_clubs_switch`.`quiz_id`, `quizzes`.`quiz_name`\n"
    . "FROM `quizzes`\n"
    . "INNER JOIN `quizzez_clubs_switch` ON `quizzez_clubs_switch`.`quiz_id` = `quizzes`.`quiz_id` WHERE `quizzez_clubs_switch`.`club_id` = (?)";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $csoportid);
$stmt->execute();

$result = $stmt->get_result();

$data = [];
while ($row = $result->fetch_assoc()) {
    $sor = [];
    $sor['id'] = $row['quiz_id'];
    $sor['Nev'] = $row['quiz_name'];
    $data[] = $sor;
}

echo json_encode($data);
?>

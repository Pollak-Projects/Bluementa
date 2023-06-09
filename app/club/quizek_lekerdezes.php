<?php

// validating user
include(dirname(__FILE__)."../../user/controllers/validate_session.php");
if(!validate_session()) return http_response_code(401);

require_once("global_connect.php");

$csoportid = $_POST['csoportid'];
$sql = "SELECT `clubs_quizzez`.`quiz_id`, `quiz`.`quiz_name`\n"
    . "FROM `quiz`\n"
    . "INNER JOIN `clubs_quizzez` ON `clubs_quizzez`.`quiz_id` = `quiz`.`quiz_id` WHERE `clubs_quizzez`.`club_id` = ?";

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

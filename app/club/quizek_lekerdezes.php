<?php
require_once("global_connect.php");

$csoportid = $_POST['csoportid'];
$sql = "SELECT `csapatok_quizei`.`quiz_id`, `quiz`.`quiz_name`\n"
    . "FROM `quiz`\n"
    . "INNER JOIN `quizzez_clubs_switch` ON `quizzez_clubs_switch`.`quiz_id` = `quiz`.`quiz_id` WHERE `quizzez_clubs_switch`.`club_id` = ?";

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

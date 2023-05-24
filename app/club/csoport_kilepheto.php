<?php
// Felhasználó ellenőrzése
include(dirname(__FILE__) . "../../user/controllers/validate_session.php");
if (!validate_session()) {
    http_response_code(401);
    return;
}

require_once("global_connect.php");

$id = get_user_session_id();

$sql = "SELECT `users_clubs_switch`.`club_id`, `clubs`.`club_name`\n"
    . "FROM `clubs`\n"
    . "    LEFT JOIN `users_clubs_switch` ON `users_clubs_switch`.`club_id` = `clubs`.`club_id` WHERE `users_clubs_switch`.`user_id` = (?);";

$result = array();
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $id);
$stmt->execute();
$stmt->store_result();
$stmt->bind_result($clubId, $clubName);
$data = [];
while ($stmt->fetch()) {
    $sor = array();
    $sor['id'] = $clubId;
    $sor['Nev'] = $clubName;
    $data[] = $sor;
}

echo json_encode($data);
?>

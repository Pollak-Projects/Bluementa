<?php
// validating user
include(dirname(__FILE__)."../../user/controllers/validate_session.php");
if(!validate_session()) return http_response_code(401);

require_once("global_connect.php");

$csoportid = $_POST['csoport'];
$sql = "SELECT `clubs_quizzez`.`club_id`\n"
    . "FROM `clubs_quizzez` WHERE `clubs_quizzez`.`club_id` = ?";

$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i", $csoportid);
$stmt->execute();
$stmt->store_result();

$sorok = $stmt->num_rows;
$stmt->close();
$mysqli->close();

if($sorok == 0) {
    echo "Ennek a csapatnak nincsenek quizei!";
} else {
    header("Location: http://localhost/blue/quizek-kiir.php?clubid=".$csoportid);
}
?>

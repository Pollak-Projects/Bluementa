<?php
require_once("connect.php");

$csoportid = $_POST['csoport'];
$sql = "SELECT `csapatok_quizei`.`csapat_id`\n"
    . "FROM `csapatok_quizei` WHERE `csapatok_quizei`.`csapat_id` = ?";

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

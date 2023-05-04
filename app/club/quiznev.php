<?php
require_once("connect.php");

$quizid = $_POST['quizek'];

$sql = "SELECT `csapatok_quizei`.`quiz_id`, `quiz`.`quiz_name`\n"

    . "FROM `quiz`\n"

    . "    INNER JOIN `csapatok_quizei` ON `csapatok_quizei`.`quiz_id` = `quiz`.`quiz_id` WHERE `csapatok_quizei`.`quiz_id` = ?;";

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
header("Location: http://localhost/HG/Blue%20Menta(No%20COPY)/quizben.html");
?>

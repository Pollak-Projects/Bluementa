<?php
require_once("global_connect.php");

$registrationId = intval($_POST['registrationId']);
$quizId = intval($_POST['quizId']);
$groupId = intval($_POST['groupId']);
$quizName = $_POST['quizName'];
$quizDescription = $_POST['quizDescription'];
$numberOfQuestions = intval($_POST['numberOfQuestions']);

$sql = "INSERT INTO `quizzes` (`quiz_id`, `registration_id`, `group_id`, `quiz_name`, `quiz_description`, `number_of_questions`) VALUES (?,?,?,?,?,?)";

$stmt = $mysqli->prepare($sql);

$stmt->bind_param("iiissi", $quizId, $registrationId, $groupId, $quizName, $quizDescription, $numberOfQuestions);

$stmt->execute();

?>
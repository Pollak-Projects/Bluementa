<?php
require_once("connect.php");

$registrationId = intval($_POST['registrationId']);
$quizId = intval($_POST['quizId']);
$questionQuestion = $_POST['questionQuestion'];
$questionAnswers = intval($_POST['questionAnswers']);
$questionMarkableAnswers = $_POST['questionMarkableAnswers'];
$questionCorrectAnswers = $_POST['questionCorrectAnswers'];
$questionDescription = $_POST['questionDescription'];
$questionType = intval($_POST['questionType']);
$null = 0;

/* TEST
$registrationId = 10;
$quizId = 10;
$questionQuestion ="aSD";
$questionAnswers = "asd";
$questionMarkableAnswers = 10;
$questionCorrectAnswers = "alma";
$questionDescription = "ASD";
$questionType = 3;
*/

// $questionId, $registrationId, $quizId, $questionQuestion, $questionAnswers, $questionMarkableAnswers, $questionCorrectAnswers, $questionDescription, $questionType

$sql = "INSERT INTO `questions` (`question_id`, `registration_id`, `quiz_id`, `question_question`, `question_answers`, `question_markable_answers`, `question_correct_answers`, `question_description`, `question_type`) VALUES (NULL,?,?,?,?,?,?,?,?)";

$stmt = $mysqli->prepare($sql);

switch($questionType){
    case 1:
        $stmt->bind_param("iississi", $registrationId, $quizId, $questionQuestion, $questionAnswers, $questionMarkableAnswers, $questionCorrectAnswers, $questionDescription, $questionType);
        break;
    case 2:
        $stmt->bind_param("iississi", $registrationId, $quizId, $questionQuestion, $questionAnswers, $questionMarkableAnswers, $questionCorrectAnswers, $questionDescription, $questionType);
        break;
    case 3:
        $stmt->bind_param("iississi", $registrationId, $quizId, $questionQuestion, $questionAnswers, $null, $questionCorrectAnswers, $questionDescription, $questionType);
        break;
    case 4:
        $stmt->bind_param("iississi", $registrationId, $quizId, $questionQuestion, $questionAnswers, $null, $questionCorrectAnswers, $questionDescription, $questionType);
        break;
}

$stmt->execute();

?>
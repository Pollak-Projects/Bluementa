<?php
if (strtoupper($_SERVER["REQUEST_METHOD"]) != "GET") {
    exit(0);
}

// this will get the current question to be 'rendered'
function asd()
{
    session_start();

    // HACK this will be awful to debug, Too bad!
    $quizId = $_SESSION["quiz_id"];

    // FIXME deprecated code used for testing
    $quizId = $_GET["QUIZ_ID"];

    // code stolen from patrik, because fuck u
    require_once("../global/database_connection/global_connect.php");

    $sql = "SELECT `questions`.*
    FROM `questions`
        LEFT JOIN `questions_quizzes_switch` ON `questions_quizzes_switch`.`questions_question_id` = `questions`.`question_id`
    WHERE `questions_quizzes_switch`.`quizzes_quiz_id` = ?
    ";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $quizId);
    $stmt->execute();

    $result = $stmt->get_result();

    $data = [];

    while ($row = $result->fetch_assoc()) {
        $sor = [];

        $sor['question_id'] = $row['question_id'];
        $sor['registration_id'] = $row['registration_id'];
        $sor['quiz_id'] = $row['quiz_id'];
        $sor['question_question'] = $row['question_question'];
        $sor['question_answers'] = $row['question_answers'];
        $sor['question_markable_answers'] = $row['question_markable_answers'];
        $sor['question_correct_answers'] = $row['question_correct_answers'];
        $sor['question_description'] = $row['question_description'];
        $sor['question_type'] = $row['question_type'];

        $data[] = $sor;
    }
    return json_encode($data);
}

echo asd();
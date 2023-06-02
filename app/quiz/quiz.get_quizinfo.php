<?php
function uwu_xXx()
{
    session_start();

    // HACK this will probably cause some headache idk for sure tho
    $quizId = $_SESSION["quizId"];

    // FIXME delete this shit rn, used for testing
    $quizId = $_GET["QUIZ_ID"];

    $quizId = 1;

    // HACK wow this is awful Too bad!
    require_once("../global/database_connection/global_connect.php");

    $sql = "SELECT quiz_name, quiz_description
    FROM quizzes
    WHERE quiz_id = ?";

    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $quizId);
    $stmt->execute();

    $result = $stmt->get_result();

    $data;

    while ($row = $result->fetch_assoc()) {
        $data = $row;
    }

    $mysqli->close();

    return json_encode($data);
}

echo uwu_xXx();
?>
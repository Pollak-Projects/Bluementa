<?php

$id = $_SESSION["id"];

include('user_id.lekerese.php');
$sql = "SELECT quiz_id FROM Questions WHERE registration_id = $id";


while ($row = mysqli_fetch_assoc($result)) {
    $quizId = $row["quiz_id"];

}

?>

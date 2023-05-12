<?php

//require_once realpath(__DIR__ . '/vendor/autoload.php');

require_once('connect.php');


// Checking if the inputs are filled
$fields = [
    'username',
    'password',
];
foreach($fields as $field){
    if(!$_POST[$field]){
        echo 'missing field: ' . $field;
        return http_response_code(400);
    }
}

// Checking if the user exists
$sql = "SELECT * FROM `users` WHERE `user_name` = ? AND `user_pass` = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("ss", $_POST['username'], $_POST['password']);
$stmt->execute();

$result = $stmt->get_result();
$row = $result->fetch_assoc();


if(  !isset($row['user_id']) ){
    echo 'No user found!';
    return http_response_code(401);
}
else{
    session_start();
    $_SESSION['id'] = $row['userid'];

    return http_response_code(200);
}

?>

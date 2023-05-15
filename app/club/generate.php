<?php

require_once("connect.php");

$fields = [
    'club_id'
];

foreach( $fields as $field){
    if(!$_POST[$field]){
        echo 'missing field: ' . $field;
        return http_response_code(400);
    }
}

function getName() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < 5; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}

$token = getName();

// lil' variable to keep gyula away uwu lol xD
$idk = "Fixy wixy me pls owo o_O";

$sql = "INSERT INTO club_tokens (token, club_id, user_id) VALUES(?, ?, ?)";
$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sis", $token, $_POST['club_id'], $idk);
$stmt->execute();
$stmt->store_result();

if(mysqli_affected_rows($mysqli) <= 1){
    return http_response_code(201);
}
else{
    return http_response_code(409);
}


?>
<?php

require_once("connect.php");
// validating user
include(dirname(__FILE__)."../../user/controllers/validate_session.php");
if(!validate_session()) return http_response_code(401);


$fields = [
    'club_id'
];

foreach( $fields as $field){
    if(!$_POST[$field]){
        echo 'missing field: ' . $field;
        return http_response_code(400);
    }
}

function generateToken() {
    $characters = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
    $randomString = '';
 
    for ($i = 0; $i < 5; $i++) {
        $index = rand(0, strlen($characters) - 1);
        $randomString .= $characters[$index];
    }
 
    return $randomString;
}

$token = generateToken();

// lil' variable to keep gyula away uwu lol xD
$idk = get_user_session_id() || "someone";

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

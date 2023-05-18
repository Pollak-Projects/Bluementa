<?php
// This Code is made by Imii and Gabor and Barta uwu

require_once("connect.php");
//Checking if the body is filled
$fields = [
    'club_id',
    'csoport',
];

foreach( $fields as $field){
    if(!$_POST[$field]){
        echo 'missing field: ' . $field;
        return http_response_code(400);
    }
}

// Adatok lekérése
$csoport = $_POST['csoport'];
$description = $_POST['des'];
//var_dump($description);

if ( !isset($description) )
{
    // Csapat készítés leírással együtt
    $sql = "INSERT INTO clubs (club_name, club_description) VALUES (?, ?)";
    $stmt = $mysqli->prepare($sql);
   
    $stmt->bind_param("ss", $csoport,$description);
    $stmt->execute();
    echo "Sikeres beküldés";

}
else
{
    // Csapat készítés leírás nélkül
    $sql = "INSERT INTO clubs (club_name) VALUES (?)";
   $stmt = $mysqli->prepare($sql);
   

   $stmt->bind_param("s", $csoport);
   $stmt->execute();
   echo "Sikeres beküldés";

}

$stmt->close();
$mysqli->next_result();

$sql = "SELECT club_name FROM club";
$row = array();
if ($result = $mysqli -> query($sql)) {
    $row = $result -> fetch_row();

    $result -> free_result();
}


$mysqli->next_result();




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
$idk = "Fixy wixy me pls owo o_O";          

$sql = "INSERT INTO club_tokens (token, club_id, user_id) VALUES(?, ?, ?)";
$stmt = $mysqli->prepare($sql);

$stmt->bind_param("sis", generateToken(), $row[0], $idk);
$stmt->execute();
$stmt->store_result();

if(mysqli_affected_rows($mysqli) <= 1){
    return http_response_code(201);
}
else{
    return http_response_code(409);
}


?>

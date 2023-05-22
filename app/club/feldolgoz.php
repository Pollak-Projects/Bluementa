<?php
// This Code is made by Imii and Gabor and Barta uwu

require_once("global_connect.php");
//Checking if the body is filled


// Adatok lekérése
$csoport = $_POST['csoport'];
$description = $_POST['des'];
//var_dump($description);

if ( !$description == NULL )
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


$mysqli->next_result();

$sql = "SELECT club_id FROM clubs WHERE club_name = (?)";
$result = array();
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $csoport);
$stmt->execute();
$stmt->store_result();

$stmt->bind_result($clubId);
while ($stmt->fetch()) {
    $result[] = $clubId;
}

$stmt->close();


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

$stmt->bind_param("sis", $token, $clubId, $idk);
$stmt->execute();
$stmt->store_result();


echo "<h1>",$token,"</h1>";
if(mysqli_affected_rows($mysqli) <= 1){
    return http_response_code(201);
}
else{
    return http_response_code(409);
}


?>

<?php
//This Code is made by Imii and Gabor
$database = "fosmenta";
$mysqli = new mysqli("localhost", "root", "MelegRakGyaszKapn43l!", $database); 

if (!$mysqli) {
    die('Nem lehet csatlakozni a MySQL-hez ' . $mysqli->connect_errno);
}
$db= $mysqli->select_db($database);
if (!$db) {
   die('Nem lehet megnyitni az adatbázist: ' . $mysqli->connect_errno);
}
@$mysqli->query('SET NAMES utf8');
?>
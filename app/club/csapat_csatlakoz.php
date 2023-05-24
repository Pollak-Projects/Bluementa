<?php

error_reporting(E_ALL); ini_set('display_errors', '1');
require_once("global_connect.php");

// validating user
include(dirname(__FILE__)."../../user/controllers/validate_session.php");
if(!validate_session()) return http_response_code(401);

// checking if token is included in body
if(!isset($_POST['token'])) return http_response_code(400);

$sql = "SELECT * FROM `club_tokens` WHERE `token` = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("s", $_POST['token'],);
$stmt->execute();
$result = $stmt->get_result();
$club_data = $result->fetch_assoc();

// in case no token exists under that string
if( !isset($club_data['club_id']) ) return http_response_code(400);

// getting club from db
$sql = "SELECT * FROM `clubs` WHERE `club_id` = ?";
$stmt = $mysqli->prepare($sql);
$stmt->bind_param("i",$club_data['club_id']);
$stmt->execute();
$result = $stmt->get_result();
$dbclub = $result->fetch_assoc();




$selected = $dbclub['club_id'];
$id = get_user_session_id();
$sql = "INSERT INTO `users_clubs_switch` (`club_id`, `user_id`) VALUES (?, ?);";
$stmt = $mysqli->prepare($sql);   

$stmt->bind_param("is", $selected,$id);
$stmt->execute();

header('Location: ./assets/tanuloi-felulet.html');
exit();

?>
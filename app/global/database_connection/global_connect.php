<?php
$mysqli = new mysqli("localhost:3306", "tanulo", "tanulo", "Bluementa");

if (!$mysqli) {
    die('Unable to coonnect to the MySql server' . $mysqli->connect_errno);
}

@$mysqli->query('SET NAMES utf8mb4');

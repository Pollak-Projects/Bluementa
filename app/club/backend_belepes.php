<?php
// This Code is made by Gabor 
// validating user
// okay
include(dirname(__FILE__)."../../user/controllers/validate_session.php");
if(!validate_session()) return http_response_code(401);

require_once("global_connect.php");
// Adatok lekérése
$id = $_POST['id'];
$nev =  $_POST['nev'];

$permissionlvl = 2;

if ($permissionlvl == 1)
{
    header("Location: http://localhost/blue/assets/tanuloi-felulet.html");
    exit();
}
elseif ($permissionlvl == 2)
{
    header("Location: http://localhost/blue/assets/tanar-kezeles.html");
    exit();
}

?>

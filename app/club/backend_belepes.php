<?php
// This Code is made by Gabor 

require_once("connect.php");
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
    header("Location: http://localhost/blue/assets/csoport-kezeles.html");
    exit();
}

?>
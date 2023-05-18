<?php

require_once("global_connect.php");
$id = 1;
// Adatok lekérése
        $selected = $_POST['csoport-kilep'];
        $sql = "DELETE FROM `clubs_users_switch` WHERE `clubs_users_switch`.`club_id` = ? AND `clubs_users_switch`.`user_id` = ?;";

        $stmt = $mysqli->prepare($sql);
   

        $stmt->bind_param("ii", $selected,$id);
        $stmt->execute();
        echo "Sikeres kilépés!";
    

?>
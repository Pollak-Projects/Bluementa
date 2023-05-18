<?php

require_once("global_connect.php");
// Adatok lekérése
    if(!empty($_POST['csoport-csat'])) {
        $selected = intval($_POST['csoport-csat']);
        $id = 1;
        $sql = "INSERT INTO `clubs_users_switch` (`club_id`, `user_id`) VALUES (?, ?);";


        $stmt = $mysqli->prepare($sql);
   

        $stmt->bind_param("ii", $selected,$id);
        $stmt->execute();
        echo "Sikeres csatlakozás a csapathoz!";
    }
?>
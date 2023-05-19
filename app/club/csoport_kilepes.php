<?php

require_once("connect.php");
$id = 1;
// Adatok lekérése
        $selected = $_POST['csoport-kilep'];
        $sql = "DELETE FROM `members` WHERE `members`.`club_id` = ? AND `members`.`user_id` = ?;";

        $stmt = $mysqli->prepare($sql);
   

        $stmt->bind_param("ii", $selected,$id);
        $stmt->execute();
        echo "Sikeres kilépés!";
    

?>
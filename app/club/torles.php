<?php
if(!isset( $_SESSION["id"] )) return http_response_code(400);
require_once("connect.php");

// Adatok lekérése
    if(isset($_POST['submit'])){
    if(!empty($_POST['csoportdel'])) {
        $selected = $_POST['csoportdel'];
        $sql = "DELETE FROM Clubs WHERE `club`.`group_id` = ?;";


        $stmt = $mysqli->prepare($sql);
   

        $stmt->bind_param("i", $selected);
        $stmt->execute();
        echo "Sikeres törlés!";
    }
}
?>
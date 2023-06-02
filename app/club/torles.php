<?php
// validating user
include(dirname(__FILE__)."../../user/controllers/validate_session.php");
if(!validate_session()) return http_response_code(401);
require_once("global_connect.php");

// Adatok lekérése
    if(isset($_POST['submit'])){
    if(!empty($_POST['csoportdel'])) {
        $selected = $_POST['csoportdel'];
        $sql = "DELETE FROM Clubs WHERE `clubs`.`club_id` = ?;";


        $stmt = $mysqli->prepare($sql);
   

        $stmt->bind_param("i", $selected);
        $stmt->execute();
        echo "Sikeres törlés!";
    }
}
?>
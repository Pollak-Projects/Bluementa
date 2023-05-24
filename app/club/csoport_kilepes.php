<?php
// validating user
include(dirname(__FILE__)."../../user/controllers/validate_session.php");
if(!validate_session()) return http_response_code(401);

require_once("global_connect.php");
$id = get_user_session_id();
// Adatok lekérése
        $selected = $_POST['csoport-kilep'];
        $sql = "DELETE FROM `users_clubs_switch` WHERE `users_clubs_switch`.`club_id` = ? AND `users_clubs_switch`.`user_id` = ?;";

        $stmt = $mysqli->prepare($sql);
   

        $stmt->bind_param("ii", $selected,$id);
        $stmt->execute();
        echo "Sikeres kilépés!";
        header('Location: ./assets/tanuloi-felulet.html');
        exit();

?>
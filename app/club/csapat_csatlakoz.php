<?php


require_once("global_connect.php");

require_once("./app/user/controllers/validate_session.php");
if(!validate_session()) return http_response_code(401);


// Adatok lekérése
    if(!empty($_POST['csoport-csat'])) {
        $selected = intval($_POST['csoport-csat']);
        $id = get_user_session_id();
        $sql = "INSERT INTO `clubs_users_switch` (`club_id`, `user_id`) VALUES (?, ?);";

        $stmt = $mysqli->prepare($sql);   

        $stmt->bind_param("is", $selected,$id);
        $stmt->execute();
        echo "Sikeres csatlakozás a csapathoz!";
    }
?>
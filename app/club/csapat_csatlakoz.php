<?php

//if(!isset( $_SESSION["id"] )) return http_response_code(400);

require_once("connect.php");
/*
//$user = validate($_COOKIE["token"]);
    $sql = "SELECT `clubs`.`club_registration_number` FROM `clubs` WHERE `clubs`.`club_registration_number` = ?;";


    $stmt = $mysqli->prepare($sql);
    $stmt->bind_param("i", $selected);
    $stmt->execute();
    $stmt->store_result();

    $sorok = $stmt->num_rows;



//Minta token validálásra
// Adatok lekérése
*/
    if(!empty($_POST['csoport-csat'])) {
        $selected = $_POST['csoport-csat'];
        $sql = "SELECT `club_tokens`.`token`, `club_tokens`.`club_id`\n"

        . "FROM `club_tokens`\n"

        . "WHERE `club_tokens`.`token`= '?';";
        //SELECT `club_tokens`.`token`, `club_tokens`.`club_id` FROM `club_tokens` WHERE `club_tokens`.`token`= "25dF4";
        $stmt = $mysqli->prepare($sql);
        $stmt->bind_param("s", $selected);
        $stmt->execute();
        $clubid = $stmt->store_result();
        $id = "5f0003d1-f615-11ed-9e3f-0a002700000f";//$user.id;
        $sql = "INSERT INTO `users_clubs_switch` (`user_id`, `club_id`) VALUES (?, ?);";


        $stmt = $mysqli->prepare($sql);
   

        $stmt->bind_param("si", $id,$clubid);
        $stmt->execute();
        echo "Sikeres csatlakozás a csapathoz!";
        $stmt->close();
        $mysqli->close();
        }
    
?>
<?php

require_once("global_connect.php");
$message = "";
// Adatok lekérése
    if(isset($_POST['submit'])){
    if(!empty($_POST['csoportdel'])) {
        $selected = $_POST['csoportdel'];
        $sql = "DELETE FROM Clubs WHERE `clubs`.`club_id` = ?;";


        $stmt = $mysqli->prepare($sql);
   

        $stmt->bind_param("i", $selected);
        $stmt->execute();
        $message = "Sikeres törlés";
        echo '<script>alert("',$message,'")</script>';
        sleep(2);
        json_encode($message);
        header("Location: http://localhost/HG/Blue/assets/tanar-felulet.html");
        exit();
    }
    else
    {
        echo '<script>alert("fasz")</script>';
    }
}
?>
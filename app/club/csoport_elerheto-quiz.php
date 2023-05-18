<?php
require_once("global_connect.php");
//$table = $_POST['tableName'];

/*$sql = "SELECT `tagok`.`csop_id`\n"

    . "FROM `tagok` WHERE `tagok`.`user_id` = ?;";

    $stmt = $mysqli->prepare($sql);
   

   $stmt->bind_param("i",$id);
*/

$sql = "SELECT `clubs_users_switch`.`club_id`, `clubs`.`club_name`\n"

    . "FROM `csapat`\n"

    . "    LEFT JOIN `clubs_users_switch` ON `clubs_users_switch`.`club_id` = `club`.`club_id` WHERE `clubs_users_switch`.`user_id` = 1;";

$result = $mysqli->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $sor = [];
    $sor['id'] = $row['club_id'];
    $sor['Nev'] = $row['club_name'];
    $data[] = $sor;
}
echo json_encode($data);
?>
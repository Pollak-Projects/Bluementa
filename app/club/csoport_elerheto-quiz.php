<?php

// validating user
include(dirname(__FILE__)."../../user/controllers/validate_session.php");
if(!validate_session()) return http_response_code(401);

require_once("global_connect.php");
//$table = $_POST['tableName'];

/*$sql = "SELECT `tagok`.`csop_id`\n"

    . "FROM `tagok` WHERE `tagok`.`user_id` = ?;";

    $stmt = $mysqli->prepare($sql);
   

   $stmt->bind_param("i",$id);
*/

$sql = "SELECT `members`.`club_id`, `clubs`.`club_name`\n"

    . "FROM `clubs`\n"

    . "    LEFT JOIN `members` ON `members`.`club_id` = `club`.`club_id` WHERE `members`.`user_id` = 1;";

$result = $mysqli->query($sql);

$data = [];
while ($row = $result->fetch_assoc()) {
    $sor = [];
    $sor['id'] = $row['club_id'];
    $sor['Nev'] = $row['group_name'];
    $data[] = $sor;
}
echo json_encode($data);
?>
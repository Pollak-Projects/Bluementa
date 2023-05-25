<?php
// validating user
include(dirname(__FILE__)."../../user/controllers/validate_session.php");
if(!validate_session()) return http_response_code(401);

require_once("global_connect.php");
$table = $_POST['tableName'];
$id = get_user_session_id();
$sql = "SELECT * FROM `".$table. "`";

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
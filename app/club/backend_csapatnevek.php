<?php
require_once("global_connect.php");
$table = $_POST['tableName'];
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
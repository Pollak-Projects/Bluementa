<?php
require_once("connect.php");
$table = $_POST['tableName'];
$id = 1;
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
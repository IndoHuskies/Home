<?php
require_once '../database.php';

$id = $conn->quote($_POST['id']);

$t_1 = $conn->quote($_POST['t_1']);

$t_2 = $conn->quote($_POST['t_2']);

$t_3 = $conn->quote($_POST['t_3']);


$sql ="INSERT INTO Keraton_2015_volunteer_followup
(v_id, t_1, t_2, t_3)
VALUES(
	".$id.",
	".$t_1.",
	".$t_2.",
	".$t_3."
	)";

$stmt = $conn->prepare($sql);
$stmt->execute();

echo json_encode("SUCCESS");
?>
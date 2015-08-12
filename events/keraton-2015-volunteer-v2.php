<?php
require_once '../database.php';

$name = $conn->quote($_POST['name']);
$email = $conn->quote($_POST['email']);
$phone = $conn->quote($_POST['phone']);
$shirt = $conn->quote($_POST['shirt']);
$vol_1 = $conn->quote($_POST['vol_1']);
$vol_2 = $conn->quote($_POST['vol_2']);
$vol_3 = $conn->quote($_POST['vol_3']);

$t_1 = $conn->quote($_POST['t_1']);

$t_2 = $conn->quote($_POST['t_2']);

$t_3 = $conn->quote($_POST['t_3']);


$sql ="INSERT INTO Keraton_2015_volunteer_v2
(name, email, phone, t_shirt, v_1, v_2, v_3, t_1, t_2, t_3)
VALUES(
	".$name.",
	".$email.",
	".$phone.",
	".$shirt.",
	".$vol_1.",
	".$vol_2.",
	".$vol_3.",
	".$t_1.",
	".$t_2.",
	".$t_3."
	)";

$stmt = $conn->prepare($sql);
$stmt->execute();

echo json_encode("SUCCESS");
?>
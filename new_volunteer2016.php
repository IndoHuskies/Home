<?php
require_once '../database.php';

$name = $conn->quote($_POST['name']);
$email = $conn->quote($_POST['email']);
$phone = $conn->quote($_POST['phone']);
$v_1 = $conn->quote($_POST['v_1']);
$v_2 = $conn->quote($_POST['v_2']);
$v_3 = $conn->quote($_POST['v_3']);

$t_1 = $conn->quote($_POST['t_1']);

$t_2 = $conn->quote($_POST['t_2']);

$t_3 = $conn->quote($_POST['t_3']);


$sql ="INSERT INTO Keraton_2016_volunteer
(name, email, phone, v_1, v_2, v_3, t_1, t_2, t_3)
VALUES(
	".$name.",
	".$email.",
	".$phone.",
	".$v_1.",
	".$v_2.",
	".$v_3.",
	".$t_1.",
	".$t_2.",
	".$t_3."
	)";

$stmt = $conn->prepare($sql);
$stmt->execute();

echo json_encode("SUCCESS");
?>
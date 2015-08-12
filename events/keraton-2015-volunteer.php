<?php
	require_once '../database.php';
	
	$name = $conn->quote($_POST['name']);
	$email = $conn->quote($_POST['email']);
	$phone = $conn->quote($_POST['phone']);
	$shirt = $conn->quote($_POST['shirt']);
	$vol_1 = $conn->quote($_POST['vol_1']);
	$vol_2 = $conn->quote($_POST['vol_2']);
	$vol_3 = $conn->quote($_POST['vol_3']);
	$vol_4 = $conn->quote($_POST['vol_4']);
	$vol_5 = $conn->quote($_POST['vol_5']);
	$hours = $conn->quote($_POST['hour']);

	$sql ="INSERT INTO Keraton_2015_volunteer
			(Name, email, phone, t_shirt, volunteer_1, volunteer_2, volunteer_3, volunteer_4, volunteer_5, hours)
			VALUES(
				".$name.",
				".$email.",
				".$phone.",
				".$shirt.",
				".$vol_1.",
				".$vol_2.",
				".$vol_3.",
				".$vol_4.",
				".$vol_5.",
				".$hours."
				)";

	$stmt = $conn->prepare($sql);
    $stmt->execute();

    echo json_encode("SUCCESS");
?>
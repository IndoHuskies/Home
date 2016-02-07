<?php
	require_once('../../database.php');

	$name = $_POST['invent_name'];
	$amount = $_POST['invent_amount'];
	$box_num = $_POST['invent_boxnum'];

	//SQL to be performed AFTER new file has been created
	$sql = "INSERT INTO inventory 
			(name, amount, box_num) 
			VALUES 
			(:name, :amount, :box_num)";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':name', $name, PDO::PARAM_STR); 
	$stmt->bindParam(':amount', $amount, PDO::PARAM_INT);    
	$stmt->bindParam(':box_num', $box_num, PDO::PARAM_STR);       
	$stmt->execute();

	header("Location: inventory.php");
?>
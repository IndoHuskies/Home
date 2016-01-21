<?php
	require_once('../database.php');

	$name = $_POST['community_name'];
	$type = $_POST['community_type'];
	$link = $_POST['community_link'];
	$description = $_POST['community_description'];
	$media = $_POST['profile'];

	//SQL to be performed AFTER new file has been created
	$sql = "INSERT INTO community 
			(id_type, name, description, link, pic) 
			VALUES 
			(:id_type, :name, :description, :link, :pic)";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':id_type', $type, PDO::PARAM_STR); 
	$stmt->bindParam(':name', $name, PDO::PARAM_INT);       
	$stmt->bindParam(':description', $description, PDO::PARAM_STR);    
	$stmt->bindParam(':link', $link, PDO::PARAM_STR);
	$stmt->bindParam(':pic', $media, PDO::PARAM_STR);

	$stmt->execute();

	header("Location: ../admin/dashboard.php");
?>
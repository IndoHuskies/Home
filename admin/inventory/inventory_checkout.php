<?php
	require_once('../../database.php');

	$item_id = $_POST['itemId'];
	$amount = $_POST['amount'];
	$rest_amount = $_POST['start_amount'] - $amount;
	$pic = $_POST['pic'];
	$checkout_date = $_POST['dates'];

	// insert to checkout
	$sql = "INSERT INTO inventory_checkout
			(item_id, amount, pic, checkout_date) 
			VALUES 
			(:id, :amount, :pic, :dates)";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':id', $item_id, PDO::PARAM_STR); 
	$stmt->bindParam(':pic', $pic, PDO::PARAM_STR);  
	$stmt->bindParam(':amount', $amount, PDO::PARAM_STR);    
	$stmt->bindParam(':dates', $dates, PDO::PARAM_STR);       
	$stmt->execute();

	// update the inventory
	$sql_co = "UPDATE inventory
			SET amount = :amount 
			WHERE id = :itemId";

	$stmt_co = $conn->prepare($sql_co);

	$stmt_co->bindParam(':itemId', $item_id, PDO::PARAM_STR); 
	$stmt_co->bindParam(':amount', $rest_amount, PDO::PARAM_STR);    
	$stmt_co->execute();

?>
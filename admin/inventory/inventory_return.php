<?php
	require_once("../../models/config.php");
	require_once('../../database.php');

	if(!isUserLoggedIn()) {
    	header("Location: ../index.php");
	}

	$item_id = $_GET['item'];
	$amount = $_GET['amount'];
	$ret_id = $_GET['id'];

	// delete checkout
	$sql = "DELETE FROM inventory_checkout WHERE id = :id";

	$stmt = $conn->prepare($sql);

	$stmt->bindParam(':id', $ret_id, PDO::PARAM_STR);      
	$stmt->execute();

	// update the inventory
	$sql_co = "UPDATE inventory
			SET amount = amount + :amount 
			WHERE id = :itemId";

	$stmt_co = $conn->prepare($sql_co);

	$stmt_co->bindParam(':itemId', $item_id, PDO::PARAM_STR); 
	$stmt_co->bindParam(':amount', $amount, PDO::PARAM_STR);    
	$stmt_co->execute();

	header("Location: inventory.php");

?>
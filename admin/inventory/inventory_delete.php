<?php
require_once('../../database.php');

$inventory = $_GET['id'];

$sql = "DELETE FROM inventory WHERE id = :id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $inventory, PDO::PARAM_INT); 
$stmt->execute();

header("Location: inventory.php");
?>
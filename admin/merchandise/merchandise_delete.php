<?php
require_once('../../database.php');

$merchandise = $_GET['id'];

$sql = "DELETE FROM merchandise WHERE id = :id";

$stmt = $conn->prepare($sql);

$stmt->bindParam(':id', $merchandise, PDO::PARAM_INT); 
$stmt->execute();

header("Location: merchandise.php");
?>
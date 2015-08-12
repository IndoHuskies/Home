<?php
require_once('../database.php');

$community = $_GET['id'];

$sql = "DELETE FROM community WHERE id = :id";

$stmt->bindParam(':id', $community, PDO::PARAM_INT); 
$stmt = $conn->prepare($sql);
$stmt->execute();

header("Location: ../admin/dashboard.html");
?>
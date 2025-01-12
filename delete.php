<?php
include 'config.php';

$id = $_GET['id'];
$query = $conn->prepare("DELETE FROM users WHERE id = ?");
$query->execute([$id]);

header("Location: index.php");
?>

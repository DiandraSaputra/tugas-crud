<?php
$host = 'localhost';
$dbname = 'users';
$username = 'root';  // ganti sesuai username MySQL Anda
$password = '';      // ganti sesuai password MySQL Anda

try {
    $conn = new PDO("mysql:host=$host;dbname=$dbname", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
} catch (PDOException $e) {
    echo "Connection failed: " . $e->getMessage();
}
?>


<?php
include 'config.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $query = $conn->prepare("INSERT INTO users (name, email, age) VALUES (?, ?, ?)");
    $query->execute([$name, $email, $age]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Tambah Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Tambah Pengguna</h2>
        <form method="POST" action="">
            <label>Nama:</label>
            <input type="text" name="name" required><br>
            <label>Email:</label>
            <input type="email" name="email" required><br>
            <label>Umur:</label>
            <input type="number" name="age" required><br>
            <button type="submit">Simpan</button>
        </form>
    </div>
</body>
</html>

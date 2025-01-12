<?php
include 'config.php';

$id = $_GET['id'];
$query = $conn->prepare("SELECT * FROM users WHERE id = ?");
$query->execute([$id]);
$user = $query->fetch(PDO::FETCH_ASSOC);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $age = $_POST['age'];

    $query = $conn->prepare("UPDATE users SET name = ?, email = ?, age = ? WHERE id = ?");
    $query->execute([$name, $email, $age, $id]);

    header("Location: index.php");
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Edit Pengguna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Edit Pengguna</h2>
        <form method="POST" action="">
            <label>Nama:</label>
            <input type="text" name="name" value="<?= $user['name'] ?>" required><br>
            <label>Email:</label>
            <input type="email" name="email" value="<?= $user['email'] ?>" required><br>
            <label>Umur:</label>
            <input type="number" name="age" value="<?= $user['age'] ?>" required><br>
            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

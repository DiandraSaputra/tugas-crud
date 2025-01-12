<?php
include 'config.php'; // Pastikan file config.php sudah disertakan untuk koneksi database
$no = 1;

try {
    // Ambil data dari database
    $query = $conn->query("SELECT * FROM users");
} catch (PDOException $e) {
    echo "Query failed: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>CRUD PHP</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h2>Daftar Pengguna</h2>
        <a href="create.php">Tambah Pengguna</a>
        <table border="1" cellpadding="10" cellspacing="0">
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Email</th>
                <th>Umur</th>
                <th>Aksi</th>
            </tr>
            <?php 
            // Cek apakah query berhasil dan mengembalikan hasil
            if ($query && $query->rowCount() > 0) {
                while ($row = $query->fetch(PDO::FETCH_ASSOC)) { ?>
                    <tr>
                    <td><?= $no++ ?></td> 
                        <td><?= htmlspecialchars($row['name']) ?></td>
                        <td><?= htmlspecialchars($row['email']) ?></td>
                        <td><?= htmlspecialchars($row['age']) ?></td>
                        <td class="actions">
                            <a href="update.php?id=<?= $row['id'] ?>">Update</a>
                            <a href="delete.php?id=<?= $row['id'] ?>" class="delete" onclick="return confirm('Yakin ingin menghapus?');">Delete</a>
                        </td>
                    </tr>
                <?php }
            } else {
                echo "<tr><td colspan='5'>Tidak ada data yang tersedia.</td></tr>";
            }
            ?>
        </table>
    </div>
</body>
</html>


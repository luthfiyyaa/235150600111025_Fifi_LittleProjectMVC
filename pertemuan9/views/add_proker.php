<?php
// session_start();
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     echo "Anda harus login untuk menambahkan program kerja.";
//     exit;
// }

// Koneksi ke database
require_once "../config/koneksi_mysql.php"; // pastikan koneksi sudah benar

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Ambil data dari form
    $nama = $_POST['nama'];
    $suratKeterangan = $_POST['surat_keteranga'];
    $nomorProgram = $_POST['nomor'];

    // Query untuk memasukkan data ke dalam tabel program kerja
    $query = "INSERT INTO program_kerja (nomor, nama, surat_keteranga) VALUES (?, ?)";
    $stmt = $pdo->prepare($query);
    $stmt->execute([$nomorprogram, $nama, $suratKeterangan]);

    // Setelah data ditambahkan, alihkan ke halaman daftar program kerja
    header("Location: list_proker.php");
    exit();
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program Kerja</title>
</head>
<body>
    <h1>Tambah Program Kerja</h1>

    <form action="list_proker.php" method="POST">
    <div>
            <label for="nomor">Nomor Program</label>
            <input type="text" name="nomor" id="nomor" required>
        </div>
        <div>
            <label for="nama">Nama Program</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div>
            <label for="suratKeterangan">Surat Keterangan</label>
            <input type="text" name="suratKeterangan" id="suratKeterangan" required>
        </div>
        <div>
            <button type="submit">Tambah Program</button>
        </div>
    </form>
</body>
</html>

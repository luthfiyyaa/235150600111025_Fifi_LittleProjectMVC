<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo "Anda harus login untuk menambahkan program kerja.";
    exit;
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

    <form action="index.php?controller=ProgramKerja&action=addProker" method="POST">
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

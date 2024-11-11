<?php

include_once '../controllers/ProgramKerja.php';
$controller = new ProgramKerjaController();

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $controller->updateProker();
    header("Location: list_proker.php");
    exit();
}

if (isset($_GET['nomor'])) {
    $nomor = (int)$_GET['nomor'];
    $programs = $controller->programModel->fetchOneProgramKerja($nomor);
} else {
    header("Location: list_proker.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program Kerja</title>
</head>
<body>
<body>
    <div class="container">
        <h2>Edit Program Kerja</h2>
        <form action="edit_proker.php" method="POST">
            <label for="nomor">Nomor Program:</label>
            <input type="number" name="nomor" id="nomor" value="<?= htmlspecialchars($programs['nomor']) ?>" readonly> <br>

            <label for="nama">Nama Program:</label>
            <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($programs['nama']) ?>" required> <br>

            <label for="surat_keterangan">Surat Keterangan:</label>
            <input type="text" name="surat_keteranga" id="surat_keterangan" value="<?= htmlspecialchars($programs['surat_keteranga']) ?>" required> <br>

            <button type="submit">Update</button>
        </form>
    </div>
</body>
</html>

<?php
// session_start();
// if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
//     echo "Anda harus login untuk mengedit program kerja.";
//     exit;
// }
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Program Kerja</title>
</head>
<body>
    <h1>Edit Program Kerja</h1>

    <?php if (isset($program)): ?>
        <form action="index.php?controller=ProgramKerja&action=updateProker" method="POST">
            <input type="hidden" name="nomorProgram" value="<?= $program['nomorProgram'] ?>">

            <div>
                <label for="nama">Nama Program</label>
                <input type="text" name="nama" id="nama" value="<?= htmlspecialchars($program['nama']) ?>" required>
            </div>

            <div>
                <label for="suratKeterangan">Surat Keterangan</label>
                <input type="text" name="suratKeterangan" id="suratKeterangan" value="<?= htmlspecialchars($program['suratKeterangan']) ?>" required>
            </div>

            <div>
                <button type="submit">Perbarui Program</button>
            </div>
        </form>
    <?php else: ?>
        <p>Program tidak ditemukan.</p>
    <?php endif; ?>
</body>
</html>

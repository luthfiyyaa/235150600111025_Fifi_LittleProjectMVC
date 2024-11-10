<?php
session_start();
if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
    echo "Anda harus login untuk melihat halaman ini.";
    exit;
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Daftar Program Kerja</title>
</head>
<body>
    <h1>Daftar Program Kerja</h1>

    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>Nama Program</th>
                <th>Surat Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if (!empty($programs)) {
                foreach ($programs as $index => $program) {
                    echo "<tr>";
                    echo "<td>" . ($index + 1) . "</td>";
                    echo "<td>" . htmlspecialchars($program['nama']) . "</td>";
                    echo "<td>" . htmlspecialchars($program['suratKeterangan']) . "</td>";
                    echo "<td>
                            <a href='edit_proker.php?nomorProgram=" . $program['nomorProgram'] . "'>Edit</a> | 
                            <a href='delete_proker.php?nomorProgram=" . $program['nomorProgram'] . "'>Hapus</a>
                          </td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='4'>Data tidak tersedia.</td></tr>";
            }
            ?>
        </tbody>
    </table>
</body>
</html>

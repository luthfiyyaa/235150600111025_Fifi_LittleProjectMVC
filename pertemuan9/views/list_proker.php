<?php
include_once '../controllers/ProgramKerja.php';
$controller = new ProgramKerjaController();
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['nomor'])) {
    $controller->deleteProker();
}
$programs = $controller->programModel->fetchAllProgramKerja();
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
                <th>Nomor Program</th>
                <th>Nama Program</th>
                <th>Surat Keterangan</th>
                <th>Aksi</th>
            </tr>
        </thead>
        <tbody>
        <?php if (!empty($programs)): ?>
            <?php foreach ($programs as $program): ?>
                <tr>
                    <td><?= $program['nomor'] ?></td>
                    <td><?= $program['nama'] ?></td>
                    <td><?= $program['surat_keteranga'] ?></td>
                    <td>
                    <button><a href="edit_proker.php?nomor=<?= $program['nomor'] ?>">Edit</a></button>                    |
                    <form action="" method="POST" style="display:inline;">
                        <input type="hidden" name="nomor" value="<?= $program['nomor'] ?>">
                        <button type="submit">Delete</button>
                    </form>
                    </td>
                </tr>
            <?php endforeach; ?>
        <?php else: ?>
            <tr>
                <td colspan="4">Belum ada data proker.</td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>

    <button>
            <a href="add_proker.php" style="text-decoration: none;">Add Program Kerja</a>
    </button>
    <button>
            <a href="../process/logout.php" style="text-decoration: none;">Logout</a>
    </button>
</body>
</html>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Tambah Program Kerja</title>
</head>
<body>
    <h1>Tambah Program Kerja</h1>

    <form action="../controllers/ProgramKerja.php?action=addProker" method="POST">
        <div>
            <label for="nomor">Nomor Program</label>
            <input type="text" name="nomor" id="nomor" required>
        </div>
        <div>
            <label for="nama">Nama Program</label>
            <input type="text" name="nama" id="nama" required>
        </div>
        <div>
            <label for="surat_keteranga">Surat Keterangan</label>
            <input type="text" name="surat_keteranga" id="surat_keteranga" required>
        </div>
        <div>
            <button type="submit">Tambah Program</button>
            <button><a href="list_proker.php">List Program</a></button>
        </div>
    </form>
</body>
</html>

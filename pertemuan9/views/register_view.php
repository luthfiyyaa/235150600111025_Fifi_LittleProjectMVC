<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengurus BEM</title>
</head>
<body>
    <h1>Registrasi Pengurus BEM</h1>
    <form action="index.php?action=registerAccount" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama:</label>
        <input type="text" name="nama" id="nama" required><br>

        <label for="nim">NIM:</label>
        <input type="text" name="nim" id="nim" required><br>

        <label for="angkatan">Angkatan:</label>
        <input type="number" name="angkatan" id="angkatan" required><br>

        <label for="jabatan">Jabatan:</label>
        <input type="text" name="jabatan" id="jabatan" required><br>

        <label for="foto">Foto:</label>
        <input type="file" name="foto" id="foto" required><br>

        <label for="password">Password:</label>
        <input type="password" name="password" id="password" required><br>

        <button type="submit">Daftar</button>
    </form>
</body>
</html>
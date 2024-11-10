<?php
session_start();

// Cek apakah form login telah disubmit
if (isset($_POST['username']) && isset($_POST['password'])) {
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Validasi kredensial (misalnya, menggunakan data hardcode atau database)
    if ($username === 'admin' && $password === 'password123') { // Ganti dengan validasi yang sesuai
        $_SESSION['logged_in'] = true;  // Menyimpan sesi login
        $_SESSION['username'] = $username;

        // Redirect ke halaman yang diinginkan setelah login
        header("Location: index.php?controller=ProgramKerja&action=viewListProker");
        exit;
    } else {
        echo "Username atau password salah.";
    }
}
?>

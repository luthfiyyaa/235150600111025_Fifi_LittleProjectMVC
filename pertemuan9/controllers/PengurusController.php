<?php

include_once("model/PengurusBEM.php");
require("config/koneksi_mysql.php");

class PengurusController 
{
    private PengurusBEM $pengurusBEM;

    public function __construct()
    {
        global $mysqli;
        $this->pengurusBEM = new PengurusBEM($mysqli);
    }

    public function viewRegister()
    {
        include("views/register_view.php");
    }

    public function registerAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nama = $_POST['nama'];
            $nim = $_POST['nim'];
            $angkatan = $_POST['angkatan'];
            $jabatan = $_POST['jabatan'];
            $foto = $_FILES['foto'];
            $password = password_hash($_POST['password'], PASSWORD_BCRYPT);

            $targetDir = "uploads/";
            $targetFile = $targetDir . basename($foto['name']);
            move_uploaded_file($foto['tmp_name'], $targetFile);

            $this->pengurusBEM->createModel($nama, $nim, $angkatan, $jabatan, $targetFile, $password);
            $this->pengurusBEM->insertPengurusBEM();

            header("Location: index.php?action=viewLogin");
            exit();
        }
    }

    public function viewLogin()
    {
        include("views/login_view.php");
    }

    public function loginAccount()
    {
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $nim = $_POST['nim'];
            $password = $_POST['password'];

            $pengurus = $this->pengurusBEM->fetchOnePengurusBEM($nim);
            if ($pengurus && password_verify($password, $pengurus['password'])) {
                session_start();
                $_SESSION['user'] = $pengurus;
                header("Location: views/list_proker.php");
                exit();
            } else {
                echo "Login gagal! NIM atau password salah.";
                include("views/login_view.php");
            }
        }
    }
}
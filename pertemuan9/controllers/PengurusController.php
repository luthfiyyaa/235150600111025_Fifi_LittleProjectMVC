<?php

include_once("model/PengurusBEM.php");

class PengurusController 
{
    private $pengurusModel;

    public function __construct()
    {
        $this->pengurusModel = new PengurusBEM();
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

            $this->pengurusModel->createModel($nama, $nim, $angkatan, $jabatan, $targetFile, $password);
            $this->pengurusModel->insertPengurusBEM();

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

            $pengurus = $this->pengurusModel->fetchOnePengurusBEM($nim);
            if ($pengurus && password_verify($password, $pengurus['password'])) {
                session_start();
                $_SESSION['user'] = $pengurus;
                header("Location: index.php?action=viewListProker"); 
                exit();
            } else {
                echo "Login gagal! NIM atau password salah.";
                include("views/login_view.php");
            }
        }
    }
}
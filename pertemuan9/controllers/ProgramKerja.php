<?php

include_once("model/ProgramKerja.php");

class ProgramKerjaController 
{
    private $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramKerja();
    }

    private function checkLogin()
    {
        if (!isset($_SESSION['logged_in']) || $_SESSION['logged_in'] !== true) {
            header("Location: login_view.php");
            exit;
        }
    }

    public function viewAddProker()
    {
        $this->checkLogin();

        include("views/add_proker.php");
    }

    public function viewEditProker()
    {
        $this->checkLogin();

        if (isset($_GET['nomorProgram'])) {
            $nomorProgram = $_GET['nomorProgram'];
    
            $program = $this->programModel->fetchOneProgramKerja($nomorProgram);

            if ($program) {
                include("views/edit_proker.php");
            } else {
                echo "Program Kerja tidak ditemukan.";
            }
        } else {
            echo "Nomor Program tidak ditemukan.";
        }
    }

    public function viewListProker()
    {
        $this->checkLogin();

        $programs = $this->programModel->fetchAllProgramKerja();

        include("views/list_proker.php");
    }

    public function addProker()
    {
        if (isset($_POST['nama']) && isset($_POST['suratKeterangan'])) {
        $nama = $_POST['nama'];
        $suratKeterangan = $_POST['surat_keteranga'];
        $nomorProgram = $_POST['nomor'];

        $this->programModel->insertProgramKerja($nomor, $nama, $surat_keteranga);
        require 'views/add_proker.php';
        exit;
    } 
    }

    public function updateProker()
    {
        global $nomorProgram;
        if (isset($_POST['nomorProgram']) && isset($_POST['nama']) && isset($_POST['suratKeterangan'])) {
            $nomorProgram = $_POST['nomorProgram'];
            $nama = $_POST['nama'];
            $suratKeterangan = $_POST['suratKeterangan'];
    
            $this->programModel->updateProgramKerja($nomorProgram, $nama, $suratKeterangan);
    
            header("Location: index.php?controller=ProgramKerja&action=list");
            exit;
        } else {
            $data = $this->programModel->fetchOneProgramKerja($nomorProgram);
            require 'views/edit_proker.php';
        }
    }

    public function deleteProker()
    {
        global $nomorProgram;
        $this->programModel->deleteProgramKerja($nomorProgram);
        header('Location: index.php?controller=ProgramKerja&action=list');
    }
}
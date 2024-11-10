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
        $suratKeterangan = $_POST['suratKeterangan'];

        $this->programModel->insertProgramKerja($nama, $suratKeterangan);

        header("Location: index.php?controller=ProgramKerja&action=viewListProker");
        exit;
    }
    }

    public function updateProker()
    {
        if (isset($_POST['nomorProgram']) && isset($_POST['nama']) && isset($_POST['suratKeterangan'])) {
            $nomorProgram = $_POST['nomorProgram'];
            $nama = $_POST['nama'];
            $suratKeterangan = $_POST['suratKeterangan'];
    
            $this->programModel->updateProgramKerja($nomorProgram, $nama, $suratKeterangan);
    
            header("Location: index.php?controller=ProgramKerja&action=viewListProker");
            exit;
        }
    }

    public function deleteProker()
    {
        if (isset($_GET['nomorProgram'])) {
            $nomorProgram = $_GET['nomorProgram'];
    
            $this->programModel->deleteProgramKerja($nomorProgram);
    
            header("Location: index.php?controller=ProgramKerja&action=viewListProker");
            exit;
        } else {
            echo "Nomor Program tidak ditemukan.";
        }
    }
}
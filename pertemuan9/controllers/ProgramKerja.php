<?php

include_once("../model/ProgramKerja.php");

class ProgramKerjaController 
{
    public $programModel;

    public function __construct()
    {
        $this->programModel = new ProgramKerja();
    }

    public function viewAddProker()
    {
        include("views/add_proker.php");
    }

    public function viewEditProker()
    {
        include("../views/edit_proker.php");
    }

    public function viewListProker()
    {
        $programs = $this->programModel->fetchAllProgramKerja();
        include("views/list_proker.php");
    }

    public function addProker()
    {
        if ($_SERVER['REQUEST_METHOD'] == 'POST') {
            $nomor = $_POST['nomor'];
            $nama = $_POST['nama'];
            $surat_keteranga = $_POST['surat_keteranga'];

            if ($this->programModel->insertProgramKerja($nomor, $nama, $surat_keteranga)) {
                header("Location: ../views/list_proker.php");
                exit();
            } else {
                echo "Gagal menambahkan program kerja!";
            }
        }
        
    }

    public function updateProker()
    {
        if ($_SERVER["REQUEST_METHOD"] === "POST" && isset($_POST['nomor'])) {
            $nomor = $_POST['nomor'];
            $nama = $_POST['nama'];
            $surat_keteranga = $_POST['surat_keteranga'];

            if ($this->programModel->updateProgramKerja($nomor, $nama, $surat_keteranga)) {
                header("Location: list_proker.php");
            } else {
                echo "Gagal memperbarui program kerja.";
            }
        }
    }

    public function deleteProker()
    {
        $nomor = $_POST['nomor'];

        if ($this->programModel->deleteProgramKerja($nomor)) {
            return true;
        } else {
            echo "Gagal menghapus program kerja!";
            return false;
        }
    }

    
}

if (isset($_GET['action'])) {
    $controller = new ProgramKerjaController();

    switch ($_GET['action']) {
        case 'addProker':
            $controller->addProker();
            break;
        case 'updateProker':
            $controller->updateProker();
            break;
        case 'deleteProker':
            $controller->deleteProker();
            break;
        case 'viewAddProker':
            $controller->viewAddProker();
            break;
        case 'viewEditProker':
            $controller->viewEditProker();
            break;
        default:
            $controller->viewListProker();
    }
}
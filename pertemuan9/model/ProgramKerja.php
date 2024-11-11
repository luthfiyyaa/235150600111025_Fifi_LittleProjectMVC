<?php

require("../config/koneksi_mysql.php");
$programs = new ProgramKerja();

class ProgramKerja 
{
    private int $nomor;
    private string $nama;
    private string $surat_keteranga;
    private $db;

    public function createModel(
        $nomor = "",
        $nama = "",
        $surat_keteranga = "",
    )
    {
        $this->nomor = $nomor;
        $this->nama = $nama;
        $this->surat_keteranga = $surat_keteranga;
    }

    public function __construct()
    {
        global $mysqli;
        $this->db = $mysqli;
    }

    public function fetchAllProgramKerja()
    {
        global $mysqli;
        $stmt = $this->db->query("SELECT * FROM program_kerja");
        return $stmt->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOneProgramKerja(int $nomor)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("SELECT * FROM program_kerja WHERE nomor = ?");
        $stmt->bind_param("i", $nomor);
        $stmt->execute();
        $result = $stmt->get_result();
        return $result->fetch_assoc();
    }

    public function insertProgramKerja($nomor, $nama, $surat_keteranga) 
    {
        $stmt = $this->db->prepare("INSERT INTO program_kerja (nomor, nama, surat_keteranga) VALUES (?, ?, ?)");
        $stmt->bind_param("iss", $nomor, $nama, $surat_keteranga);
        return $stmt->execute();
    }

    public function updateProgramKerja($nomor, $nama, $surat_keteranga)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("UPDATE program_kerja SET nama = ?, surat_keteranga = ? WHERE nomor = ?");
        $stmt->bind_param("ssi", $nama, $surat_keteranga, $nomor);
        return $stmt->execute();
    }

    public function deleteProgramKerja($nomor)
    {
        global $mysqli;
        $stmt = $mysqli->prepare("DELETE FROM program_kerja WHERE nomor = ?");
        $stmt->bind_param("i", $nomor);
        return $stmt->execute();
    }
}
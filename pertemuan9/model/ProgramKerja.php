<?php

require("config/koneksi_mysql.php");

class ProgramKerja 
{
    private int $nomor;
    private string $nama;
    private string $surat_keteranga;

    public function createModel(
        $nomorProgram = "",
        $nama = "",
        $suratKeterangan = "",
    )
    {
        $this->nomorProgram = $nomorProgram;
        $this->nama = $nama;
        $this->suratKeterangan = $suratKeterangan;
    }

    public function __construct(mysqli $db)
    {
        $this->db = $db;
    }

    public function fetchAllProgramKerja()
    {
        global $conn;  

        $query = "SELECT * FROM program_kerja";
        $result = mysqli_query($conn, $query);

        $programs = [];
        while ($row = mysqli_fetch_assoc($result)) {
            $programs[] = $row;
        }
        return $programs;
    }

    public function fetchOneProgramKerja(int $nomorProgram)
    {
        global $conn;

        $query = "SELECT * FROM program_kerja WHERE nomorProgram = ?";
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "i", $nomorProgram);
        mysqli_stmt_execute($stmt);

        $result = mysqli_stmt_get_result($stmt);
        $program = mysqli_fetch_assoc($result);

        mysqli_stmt_close($stmt);

        return $program;
    }

    public function insertProgramKerja() 
    {
        if (!$this->db) {
            throw new Exception("Koneksi database tidak tersedia");
        }

        $query = "INSERT INTO program_kerja (nomor, nama, surat_keteranga) VALUES (?, ?, ?)";
        $stmt = $this->db->prepare($query);
        
        if (!$stmt) {
            throw new Exception("Error preparing statement: " . $this->db->error);
        }

        $stmt->bind_param("ss", $this->nomor, $this->nama, $this->surat_keteranga);
        
        $result = $stmt->execute();
        $stmt->close();
        
        return $result;
    }

    public function updateProgramKerja($nomorProgram, $nama, $suratKeterangan)
    {
        global $conn;

        $query = "UPDATE program_kerja SET nama = ?, suratKeterangan = ? WHERE nomorProgram = ?";
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "ssi", $nama, $suratKeterangan, $nomorProgram);

        if (mysqli_stmt_execute($stmt)) {
            echo "Program kerja berhasil diperbarui.";
        } else {
            echo "Terjadi kesalahan saat memperbarui program kerja: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt);
    }

    public function deleteProgramKerja($nomorProgram)
    {
        global $conn;

        $query = "DELETE FROM program_kerja WHERE nomorProgram = ?";
        $stmt = mysqli_prepare($conn, $query);

        mysqli_stmt_bind_param($stmt, "i", $nomorProgram);

        if (mysqli_stmt_execute($stmt)) {
            echo "Program kerja berhasil dihapus.";
        } else {
            echo "Terjadi kesalahan saat menghapus program kerja: " . mysqli_error($conn);
        }

        mysqli_stmt_close($stmt); 
    }
}
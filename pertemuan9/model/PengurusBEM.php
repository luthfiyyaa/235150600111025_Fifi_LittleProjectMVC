<?php

require("config/koneksi_mysql.php");

class PengurusBEM 
{
    private string $nama;
    private string $nim;
    private int $angkatan;
    private string $jabatan;
    private string $foto;
    private string $password;
    private $db;

    public function createModel(
        $nama = "",
        $nim = "",
        $angkatan = "",
        $jabatan = "",
        $foto = "",
        $password = "",
    )
    {
        $this->nama = $nama;
        $this->nim = $nim;
        $this->angkatan = $angkatan;
        $this->jabatan = $jabatan;
        $this->foto = $foto;
        $this->password = $password;
    }

    public function fetchAllPengurusBEM()
    {
        $result = $this->db->query("SELECT * FROM pengurus_bem");
        return $result->fetch_all(MYSQLI_ASSOC);
    }

    public function fetchOnePengurusBEM(string $nim)
    {
        $query = "SELECT * FROM pengurus_bem WHERE nim = '$nim'";
        $result = $this->db->query($query);
        return $result->fetch_assoc();
    }

    public function insertPengurusBEM() 
    {
        global $db;
        mysqli_connect("INSERT INTO pengurus_bem  VALUES ('$_POST[nama]', '$_POST[nim]', '$_POST[angkatan]', '$_POST[jabatan]', '$_POST[foto]', '$_POST[password]')");
        mysqli_query("ssisss", $this->nama, $this->nim, $this->angkatan, $this->jabatan, $this->foto, $this->password);
        // return $stmt->execute();
    }

    public function updatePengurusBEM($nim, $nama, $angkatan, $jabatan, $foto = null, $password = null)
    {
        // Mulai dengan query update dasar
        $query = "UPDATE pengurus_bem SET nama = '$nama', angkatan = '$angkatan', jabatan = '$jabatan'";

        if ($foto) {
            $query .= ", foto = '$foto'";
        }

        if ($password) {
            $hashedPassword = password_hash($password, PASSWORD_BCRYPT);
            $query .= ", password = '$hashedPassword'";
        }

        $query .= " WHERE nim = '$nim'";

        if ($this->db->query($query) === TRUE) {
            echo "Data berhasil diperbarui!";
        } else {
            echo "Error: " . $query . "<br>" . $this->db->error;
        }
    }

    public function deletePengurusBEM($nim)
    {
        $query = "DELETE FROM pengurus_bem WHERE nim = '$nim'";

        if ($this->db->query($query) === TRUE) {
            echo "Data berhasil dihapus!";
        } else {
            echo "Error: " . $query . "<br>" . $this->db->error;
        } 
    }
}
<?php
require_once 'Karyawan.php';

class KaryawanKontrak extends Karyawan {
    private $durasiKontrakBulan;
    private $agensiPenyaluran;

    public function __construct($id, $nama, $dept, $hari, $gaji, $durasi, $agensi) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        $this->durasiKontrakBulan = $durasi;
        $this->agensiPenyaluran = $agensi;
    }

    public static function getDaftarKontrak($db) {
        $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Kontrak'";
        return mysqli_query($db, $query);
    }

    // Overriding: Gaji Bersih = hariKerjaMasuk * gajiDasarPerHari
    public function hitungGajiBersih() {
        return $this->hariKerjaMasuk * $this->gajiDasarPerHari;
    }

    public function tampilkanProfilKaryawan() {
        return "Durasi: " . $this->durasiKontrakBulan . " Bulan, Agensi: " . $this->agensiPenyaluran;
    }
}
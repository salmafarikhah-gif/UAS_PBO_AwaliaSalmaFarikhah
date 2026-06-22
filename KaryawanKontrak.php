<?php
require_once 'Karyawan.php';

class KaryawanKontrak extends Karyawan {
    // Properti tambahan spesifik karyawan kontrak
    private $durasiKontrakBulan;
    private $agensiPenyaluran;

    public function __construct($id, $nama, $dept, $hari, $gaji, $durasi, $agensi) {
        // Memanggil constructor abstract class induk
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        $this->durasiKontrakBulan = $durasi;
        $this->agensiPenyaluran = $agensi;
    }

    // Fungsi internal untuk mengambil data spesifik kontrak dari database
    public static function getDaftarKontrak($db) {
        $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Kontrak'";
        return mysqli_query($db, $query);
    }

    // Implementasi wajib method abstrak dari induk (Logika hitung di Tahap 5)
    public function hitungGajiBersih() { return 0; }
    public function tampilkanProfilKaryawan() { return ""; }
}
<?php
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan {
    // Properti tambahan spesifik karyawan magang
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    public function __construct($id, $nama, $dept, $hari, $gaji, $uangSaku, $sertifikat) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        $this->uangSakuBulanan = $uangSaku;
        $this->sertifikatKampusMerdeka = $sertifikat;
    }

    // Fungsi internal untuk mengambil data spesifik magang dari database
    public static function getDaftarMagang($db) {
        $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Magang'";
        return mysqli_query($db, $query);
    }

    public function hitungGajiBersih() { return 0; }
    public function tampilkanProfilKaryawan() { return ""; }
}
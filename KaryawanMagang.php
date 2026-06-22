<?php
require_once 'Karyawan.php';

class KaryawanMagang extends Karyawan {
    private $uangSakuBulanan;
    private $sertifikatKampusMerdeka;

    public function __construct($id, $nama, $dept, $hari, $gaji, $uangSaku, $sertifikat) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        $this->uangSakuBulanan = $uangSaku;
        $this->sertifikatKampusMerdeka = $sertifikat;
    }

    public static function getDaftarMagang($db) {
        $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Magang'";
        return mysqli_query($db, $query);
    }

    // Overriding: Gaji Bersih = (hariKerjaMasuk * gajiDasarPerHari) * 0.80
    public function hitungGajiBersih() {
        return ($this->hari_kerja_masuk * $this->gaji_dasar_per_hari) * 0.80;
    }

    public function tampilkanProfilKaryawan() {
        return "Uang Saku: Rp" . number_format($this->uangSakuBulanan, 0, ',', '.') . ", Sertifikat: " . $this->sertifikatKampusMerdeka;
    }
}
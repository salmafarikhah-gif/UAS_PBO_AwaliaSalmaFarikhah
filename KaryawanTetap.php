<?php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    private $tunjanganKesehatan;
    private $opsiSahamId;

    public function __construct($id, $nama, $dept, $hari, $gaji, $tunjangan, $sahamId) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        $this->tunjanganKesehatan = $tunjangan;
        $this->opsiSahamId = $sahamId;
    }

    public static function getDaftarTetap($db) {
        $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Tetap'";
        return mysqli_query($db, $query);
    }

    // Overriding: Gaji Bersih = (hari_kerja_masuk * gaji_dasar_per_hari) + tunjanganKesehatan
    public function hitungGajiBersih() {
        return ($this->hari_kerja_masuk * $this->gaji_dasar_per_hari) + $this->tunjanganKesehatan;
    }

    public function tampilkanProfilKaryawan() {
        return "Tunjangan: Rp" . number_format($this->tunjanganKesehatan, 0, ',', '.') . ", Saham ID: " . $this->opsiSahamId;
    }
}
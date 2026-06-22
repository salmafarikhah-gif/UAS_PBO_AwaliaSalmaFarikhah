<?php
require_once 'Karyawan.php';

class KaryawanTetap extends Karyawan {
    // Properti tambahan spesifik karyawan tetap
    private $tunjanganKesehatan;
    private $opsiSahamId;

    public function __construct($id, $nama, $dept, $hari, $gaji, $tunjangan, $sahamId) {
        parent::__construct($id, $nama, $dept, $hari, $gaji);
        $this->tunjanganKesehatan = $tunjangan;
        $this->opsiSahamId = $sahamId;
    }

    // Fungsi internal untuk mengambil data spesifik tetap dari database
    public static function getDaftarTetap($db) {
        $query = "SELECT * FROM tabel_karyawan WHERE jenis_karyawan = 'Tetap'";
        return mysqli_query($db, $query);
    }

    public function hitungGajiBersih() { return 0; }
    public function tampilkanProfilKaryawan() { return ""; }
}
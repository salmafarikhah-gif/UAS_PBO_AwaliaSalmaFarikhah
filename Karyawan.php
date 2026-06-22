<?php
// Abstract class induk untuk enkapsulasi data karyawan
abstract class Karyawan {
    // Properti terenkapsulasi dengan hak akses protected
    protected $id_karyawan;
    protected $nama_karyawan;
    protected $departemen;
    protected $hari_kerja_masuk;
    protected $gaji_dasar_per_hari;

    // Constructor untuk inisialisasi properti global
    public function __construct($id, $nama, $dept, $hari, $gaji) {
        $this->id_karyawan = $id;
        $this->nama_karyawan = $nama;
        $this->departemen = $dept;
        $this->hari_kerja_masuk = $hari;
        $this->gaji_dasar_per_hari = $gaji;
    }

    // Abstract method wajib tanpa body (kurung kurawal)
    abstract public function hitungGajiBersih();
    abstract public function tampilkanProfilKaryawan();
}
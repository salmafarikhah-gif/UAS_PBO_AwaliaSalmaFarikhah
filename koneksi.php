<?php
// Koneksi database terpusat langsung menggunakan mysqli
$db = mysqli_connect("localhost", "root", "", "db_uas_pbo_ti1c_awaliasalmafarikhah");

if (!$db) {
    die("Koneksi database gagal: " . mysqli_connect_error());
}
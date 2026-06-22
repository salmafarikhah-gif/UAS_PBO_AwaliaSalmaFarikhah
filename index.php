<?php
require_once 'koneksi.php';
require_once 'KaryawanKontrak.php';
require_once 'KaryawanTetap.php';
require_once 'KaryawanMagang.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Dashboard Penggajian Karyawan</title>
    <style>
        body { font-family: 'Segoe UI', sans-serif; margin: 0; padding: 30px; background-color: #f8fafc; color: #1e293b; }
        .container { max-width: 1200px; margin: 0 auto; }
        h1 { text-align: center; color: #0f172a; margin-bottom: 40px; text-transform: uppercase; font-size: 24px; border-bottom: 3px solid #3b82f6; padding-bottom: 10px; }
        .section-title { font-size: 18px; font-weight: 600; color: #1e3a8a; margin-top: 30px; margin-bottom: 15px; display: flex; align-items: center; }
        .section-title::before { content: ""; display: inline-block; width: 6px; height: 20px; background-color: #3b82f6; margin-right: 10px; border-radius: 3px; }
        .table-responsive { background: #ffffff; border-radius: 12px; box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05); overflow: hidden; margin-bottom: 30px; border: 1px solid #e2e8f0; }
        table { width: 100%; border-collapse: collapse; text-align: left; }
        th, td { padding: 14px 20px; font-size: 14px; }
        th { background-color: #f1f5f9; color: #475569; text-transform: uppercase; font-size: 12px; border-bottom: 2px solid #e2e8f0; }
        tr { border-bottom: 1px solid #f1f5f9; }
        tr:hover { background-color: #f8fafc; }
        .badge-info { background-color: #eff6ff; color: #1d4ed8; padding: 6px 12px; border-radius: 20px; font-size: 13px; border: 1px solid #bfdbfe; }
        .gaji-bersih { color: #15803d; font-weight: 700; font-size: 15px; }
    </style>
</head>
<body>

<div class="container">
    <h1>Sistem Informasi Penggajian Karyawan</h1>

    <div class="section-title">Daftar Karyawan Kontrak</div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Nama Karyawan</th><th>Departemen</th><th>Hari Kerja</th><th>Gaji / Hari</th><th>Spesifikasi Jabatan</th><th>Gaji Bersih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resKontrak = KaryawanKontrak::getDaftarKontrak($db);
                while ($row = mysqli_fetch_assoc($resKontrak)) {
                    $karyawan = new KaryawanKontrak(
                        $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                        $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                        $row['durasi_kontrak_bulan'], $row['agensi_penyalur']
                    );
                    echo "<tr>
                            <td><strong>{$row['id_karyawan']}</strong></td>
                            <td>{$row['nama_karyawan']}</td>
                            <td>{$row['departemen']}</td>
                            <td>{$row['hari_kerja_masuk']} Hari</td>
                            <td>Rp " . number_format($row['gaji_dasar_per_hari'], 0, ',', '.') . "</td>
                            <td><span class='badge-info'>" . $karyawan->tampilkanProfilKaryawan() . "</span></td>
                            <td><span class='gaji-bersih'>Rp " . number_format($karyawan->hitungGajiBersih(), 0, ',', '.') . "</span></td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="section-title">Daftar Karyawan Tetap</div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Nama Karyawan</th><th>Departemen</th><th>Hari Kerja</th><th>Gaji / Hari</th><th>Spesifikasi Jabatan</th><th>Gaji Bersih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resTetap = KaryawanTetap::getDaftarTetap($db);
                while ($row = mysqli_fetch_assoc($resTetap)) {
                    $karyawan = new KaryawanTetap(
                        $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                        $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                        $row['tunjangan_kesehatan'], $row['opsi_saham_id']
                    );
                    echo "<tr>
                            <td><strong>{$row['id_karyawan']}</strong></td>
                            <td>{$row['nama_karyawan']}</td>
                            <td>{$row['departemen']}</td>
                            <td>{$row['hari_kerja_masuk']} Hari</td>
                            <td>Rp " . number_format($row['gaji_dasar_per_hari'], 0, ',', '.') . "</td>
                            <td><span class='badge-info'>" . $karyawan->tampilkanProfilKaryawan() . "</span></td>
                            <td><span class='gaji-bersih'>Rp " . number_format($karyawan->hitungGajiBersih(), 0, ',', '.') . "</span></td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>

    <div class="section-title">Daftar Karyawan Magang</div>
    <div class="table-responsive">
        <table>
            <thead>
                <tr>
                    <th>ID</th><th>Nama Karyawan</th><th>Departemen</th><th>Hari Kerja</th><th>Gaji / Hari</th><th>Spesifikasi Jabatan</th><th>Gaji Bersih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resMagang = KaryawanMagang::getDaftarMagang($db);
                while ($row = mysqli_fetch_assoc($resMagang)) {
                    $karyawan = new KaryawanMagang(
                        $row['id_karyawan'], $row['nama_karyawan'], $row['departemen'],
                        $row['hari_kerja_masuk'], $row['gaji_dasar_per_hari'],
                        $row['uang_saku_bulanan'], $row['sertifikat_kampus_merdeka']
                    );
                    echo "<tr>
                            <td><strong>{$row['id_karyawan']}</strong></td>
                            <td>{$row['nama_karyawan']}</td>
                            <td>{$row['departemen']}</td>
                            <td>{$row['hari_kerja_masuk']} Hari</td>
                            <td>Rp " . number_format($row['gaji_dasar_per_hari'], 0, ',', '.') . "</td>
                            <td><span class='badge-info'>" . $karyawan->tampilkanProfilKaryawan() . "</span></td>
                            <td><span class='gaji-bersih'>Rp " . number_format($karyawan->hitungGajiBersih(), 0, ',', '.') . "</span></td>
                          </tr>";
                }
                ?>
            </tbody>
        </table>
    </div>
</div>

</body>
</html>
<?php
// Mengambil file koneksi dan semua kelas yang diperlukan
require_once 'koneksi.php';
require_once 'KaryawanKontrak.php';
require_once 'KaryawanTetap.php';
require_once 'KaryawanMagang.php';
?>
<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Penggajian Karyawan</title>
    <style>
        /* Gaya Modern & Minimalis */
        body { 
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; 
            margin: 0; 
            padding: 30px; 
            background-color: #f8fafc; 
            color: #1e293b; 
        }
        
        .container {
            max-width: 1200px;
            margin: 0 auto;
        }

        h1 { 
            text-align: center; 
            color: #0f172a; 
            font-weight: 700;
            letter-spacing: -0.5px;
            margin-bottom: 40px;
            text-transform: uppercase;
            font-size: 24px;
            border-bottom: 3px solid #3b82f6;
            padding-bottom: 10px;
            display: inline-block;
            left: 50%;
            transform: translateX(-50%);
            position: relative;
        }

        /* Desain Card & Judul Kategori */
        .section-title { 
            font-size: 18px;
            font-weight: 600;
            color: #1e3a8a; 
            margin-top: 30px; 
            margin-bottom: 15px;
            display: flex;
            align-items: center;
        }
        .section-title::before {
            content: "";
            display: inline-block;
            width: 6px;
            height: 20px;
            background-color: #3b82f6;
            margin-right: 10px;
            border-radius: 3px;
        }

        /* Desain Tabel Menarik (Glassmorphism & Clean Table) */
        .table-responsive {
            background: #ffffff;
            border-radius: 12px;
            box-shadow: 0 4px 6px -1px rgba(0, 0, 0, 0.05), 0 2px 4px -1px rgba(0, 0, 0, 0.03);
            overflow: hidden;
            margin-bottom: 30px;
            border: 1px solid #e2e8f0;
        }

        table { 
            width: 100%; 
            border-collapse: collapse; 
            text-align: left; 
        }

        th, td { 
            padding: 14px 20px; 
            font-size: 14px;
        }

        th { 
            background-color: #f1f5f9; 
            color: #475569; 
            font-weight: 600;
            text-transform: uppercase;
            font-size: 12px;
            letter-spacing: 0.5px;
            border-bottom: 2px solid #e2e8f0;
        }

        tr {
            border-bottom: 1px solid #f1f5f9;
            transition: background-color 0.2s ease;
        }

        /* Efek Hover Interaktif saat Baris Ditunjuk Mouse */
        tr:hover { 
            background-color: #f8fafc; 
        }

        tr:last-child {
            border-bottom: none;
        }

        /* Badge untuk Spesifikasi Jabatan */
        .badge-info {
            background-color: #eff6ff;
            color: #1d4ed8;
            padding: 6px 12px;
            border-radius: 20px;
            font-size: 13px;
            font-weight: 500;
            display: inline-block;
            border: 1px solid #bfdbfe;
        }

        /* Highlight Nominal Gaji Bersih */
        .gaji-bersih {
            color: #15803d;
            font-weight: 700;
            font-size: 15px;
        }

        .text-center { text-center }
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
                    <th>ID</th>
                    <th>Nama Karyawan</th>
                    <th>Departemen</th>
                    <th>Hari Kerja</th>
                    <th>Gaji / Hari</th>
                    <th>Spesifikasi Jabatan</th>
                    <th>Gaji Bersih</th>
                </tr>
            </thead>
            <tbody>
                <?php
                $resKontrak = KaryawanKontrak::getDaftarKontrak($db);
                while ($row = mysqli_fetch_assoc($resKontrak)) {
                    $karyawan = new KaryawanKontrak(
                        $row['id_karyawan'], $row
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard Absensi</title>
    <style>
        /* Gaya keseluruhan */
        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f4f6f9;
            margin: 0;
            padding: 0;
            display: flex;
            height: 100vh;
        }

        /* Sidebar */
        .sidebar {
            width: 250px;
            background-color: #2c3e50;
            color: white;
            display: flex;
            flex-direction: column;
            padding: 20px;
            box-shadow: 2px 0 8px rgba(0, 0, 0, 0.1);
        }

        .sidebar h2 {
            font-size: 24px;
            margin-bottom: 20px;
            text-align: center;
        }

        .sidebar a {
            text-decoration: none;
            color: white;
            font-size: 16px;
            padding: 10px 15px;
            border-radius: 8px;
            margin-bottom: 10px;
            display: block;
            transition: background-color 0.3s ease;
        }

        .sidebar a:hover {
            background-color: #1abc9c;
        }

        /* Konten Utama */
        .main-content {
            flex-grow: 1;
            padding: 40px;
            overflow-y: auto;
        }

        .main-content h1 {
            font-size: 32px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .main-content p {
            font-size: 18px;
            color: #7f8c8d;
            margin-bottom: 30px;
        }

        /* Informasi tambahan */
        .info-card {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            margin-bottom: 20px;
        }

        .info-card h3 {
            font-size: 20px;
            color: #3498db;
            margin-bottom: 10px;
        }

        .info-card p {
            font-size: 16px;
            color: #7f8c8d;
        }

        /* Responsif */
        @media (max-width: 768px) {
            .sidebar {
                width: 200px;
                padding: 15px;
            }

            .main-content {
                padding: 20px;
            }
        }
    </style>
</head>
<body>

<!-- Sidebar -->
<div class="sidebar">
    <h2>Absensi</h2>
    <a href="?page=home">Dashboard</a>
    <a href="?page=tambah">Tambah Data Siswa</a>
    <a href="?page=tmabsen">Tambah Absensi</a>
    <a href="?page=absensi">Lihat Absensi</a>
    <a href="?page=keluar">Keluar</a>
</div>

<!-- Konten Utama -->
<div class="main-content">
    <h1>Selamat Datang di Dashboard Absensi</h1>
    <p>Gunakan navigasi di sisi kiri untuk mengelola data siswa, absensi, atau pengaturan sistem.</p>

    <!-- Kartu Informasi -->
    <div class="info-card">
        <h3>Status Sistem</h3>
        <p>Sistem berjalan normal. Tidak ada masalah yang terdeteksi.</p>
    </div>

    <div class="info-card">
        <h3>Data Terbaru</h3>
        <p>Jumlah siswa terdaftar: <b>45 siswa</b></p>
        <p>Data absensi hari ini: <b>35 hadir, 5 izin, 3 sakit, 2 alfa</b></p>
    </div>
</div>

</body>
</html>

<?php
include 'lib/koneksi.php';

$sql = "SELECT absensi.id, siswa.nama, siswa.kelas, absensi.tanggal, absensi.status 
 FROM absensi 
 JOIN siswa ON absensi.id_siswa = siswa.id";
$data = $pdo->query($sql)->fetchAll(PDO::FETCH_ASSOC);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Data Absensi</title>
    <style>
        /* CSS untuk tema putih dan biru */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9ff; /* Latar belakang putih kebiruan */
            color: #333; /* Warna teks utama */
        }

        h1 {
            text-align: center;
            margin-top: 20px;
            color: #0056b3; /* Warna biru kalem */
        }

        table {
            width: 90%;
            margin: 20px auto;
            border-collapse: collapse;
            background-color: #ffffff; /* Warna putih untuk tabel */
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }

        th, td {
            border: 1px solid #ddd;
            padding: 10px;
            text-align: center;
        }

        th {
            background-color: #0056b3; /* Warna biru kalem untuk header */
            color: #ffffff; /* Teks putih */
        }

        tr:nth-child(even) {
            background-color: #f2f2f2; /* Warna abu-abu muda */
        }

        tr:hover {
            background-color: #e6f7ff; /* Highlight biru muda saat di-hover */
        }

        .btn {
            text-decoration: none;
            color: white;
            padding: 5px 10px;
            background-color: #0056b3; /* Biru kalem */
            border-radius: 4px;
        }

        .btn:hover {
            background-color: #004599; /* Biru lebih gelap saat di-hover */
        }

        button {
            background: none;
            border: none;
            padding: 0;
        }
    </style>
</head>
<body>
    <h1>Data Absensi</h1>
    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Tanggal</th>
                <th>Status</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            <?php foreach ($data as $row): ?>
                <tr>
                    <td><?= $row['id']; ?></td>
                    <td><?= $row['nama']; ?></td>
                    <td><?= $row['kelas']; ?></td>
                    <td><?= $row['tanggal']; ?></td>
                    <td><?= $row['status']; ?></td>
                    <td>
                        <button>
                            <a href="?page=update&id=<?= $row['id']; ?>" class="btn">Ubah Status</a>
                        </button>
                        |
                        <button>
                            <a href="?page=hapus&id=<?= $row['id']; ?>" class="btn">Hapus</a>
                        </button>
                    </td>
                </tr>
            <?php endforeach; ?>
        </tbody>
    </table>
</body>
</html>

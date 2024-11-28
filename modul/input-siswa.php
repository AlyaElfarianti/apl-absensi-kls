<?php 
include 'lib/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    $sql = "INSERT INTO siswa (nama, kelas) VALUES (:nama, :kelas)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['nama' => $nama, 'kelas' => $kelas]);
    echo "<div class='success-msg'>Data siswa berhasil ditambahkan!</div>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Absensi Kelas</title>
    <style>
        /* CSS untuk form */
        body {
            font-family: Arial, sans-serif;
            background-color: #f9f9f9;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            flex-direction: column;
        }

        .form-container {
            background-color: #fff;
            padding: 20px 30px;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            width: 100%;
            max-width: 400px;
            margin-bottom: 20px;
        }

        h3 {
            text-align: center;
            color: #333;
            margin-bottom: 20px;
        }

        label {
            font-size: 14px;
            color: #555;
            margin-bottom: 8px;
            display: block;
        }

        input[type="text"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #ccc;
            border-radius: 5px;
            font-size: 14px;
            box-sizing: border-box;
        }

        .add-btn, .back-btn {
            width: 100%;
            padding: 10px;
            border: none;
            color: #fff;
            font-size: 16px;
            border-radius: 5px;
            cursor: pointer;
            transition: background-color 0.3s ease;
        }

        .add-btn {
            background-color: #007bff;
        }

        .add-btn:hover {
            background-color: #0056b3;
        }

        .back-btn {
            background-color: #6c757d;
            margin-top: 10px;
        }

        .back-btn:hover {
            background-color: #5a6268;
        }

        .success-msg {
            text-align: center;
            margin-top: 20px;
            color: #28a745;
            font-size: 14px;
            background-color: #d4edda;
            padding: 10px;
            border-radius: 5px;
            border: 1px solid #c3e6cb;
        }
    </style>
</head>
<body>

<form method="POST">
    <div class="form-container">
        <h3>Input Data Siswa</h3>
        <label for="nama">Nama</label>
        <input type="text" name="nama" required>

        <label for="kelas">Kelas</label>
        <input type="text" name="kelas" required>

        <button type="submit" class="add-btn">Tambah</button>
    </div>
</form>

<!-- Tombol Kembali -->
<a href="index.php"><button class="back-btn">Kembali</button></a>

</body>
</html>

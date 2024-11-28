<?php 
include 'lib/koneksi.php';

// Inisialisasi variabel untuk pesan sukses
$message = '';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk mendapatkan data absensi
    $sql = "SELECT * FROM absensi WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);
    $stmt->execute();
    $absensi = $stmt->fetch(PDO::FETCH_ASSOC);

    if (!$absensi) {
        die("Data dengan ID $id tidak ditemukan.");
    }
} else {
    die("ID tidak diberikan.");
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    // Query untuk mengupdate data absensi
    $sql = "UPDATE absensi SET tanggal = :tanggal, status = :status WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->bindParam(':tanggal', $tanggal);
    $stmt->bindParam(':status', $status);
    $stmt->bindParam(':id', $id, PDO::PARAM_INT);

    if ($stmt->execute()) {
        $message = "Data berhasil diupdate!";
    } else {
        $message = "Error: Gagal mengupdate data.";
    }
}
?>



<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Absensi</title>
    <style>
        /* CSS untuk tema putih dan biru */
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            background-color: #f9f9ff;
            color: #333;
        }

        .form-container {
            width: 100%;
            max-width: 400px;
            margin: 50px auto;
            background-color: #ffffff;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
            padding: 20px;
        }

        .form-container h2 {
            text-align: center;
            color: #0056b3;
            margin-bottom: 20px;
        }

        .form-group {
            margin-bottom: 15px;
        }

        .form-group label {
            display: block;
            margin-bottom: 5px;
            font-weight: bold;
        }

        .form-group input,
        .form-group select {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            font-size: 16px;
        }

        .form-group input:focus,
        .form-group select:focus {
            outline: none;
            border-color: #0056b3;
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);
        }

        button {
            width: 100%;
            padding: 10px;
            background-color: #0056b3;
            color: #ffffff;
            border: none;
            border-radius: 4px;
            font-size: 16px;
            cursor: pointer;
            margin-top: 10px;
        }

        button:hover {
            background-color: #004599;
        }

        button:focus {
            outline: none;
            box-shadow: 0 0 5px rgba(0, 86, 179, 0.5);
        }

        .success-message {
            text-align: center;
            margin-top: 20px;
            padding: 10px;
            background-color: #d4edda;
            color: #155724;
            border: 1px solid #c3e6cb;
            border-radius: 4px;
        }

        .back-button {
            display: block;
            text-align: center;
            margin-top: 10px;
            text-decoration: none;
            background-color: #0056b3;
            color: white;
            padding: 10px;
            border-radius: 4px;
            font-size: 14px;
        }

        .back-button:hover {
            background-color: #004599;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Update Data Absensi</h2>
    
    <!-- Menampilkan pesan sukses jika ada -->
    <?php if ($message): ?>
        <div class="success-message">
            <?= $message; ?>
        </div>
        <a href="?page=absensi" class="back-button">Kembali</a>

    <?php else: ?>
        <form method="POST">
            <div class="form-group">
                <label for="tanggal">Tanggal</label>
                <input type="date" id="tanggal" name="tanggal" value="<?= $absensi['tanggal']; ?>" required>
            </div>

            <div class="form-group">
                <label for="status">Status</label>
                <select id="status" name="status" required>
                    <option value="Hadir" <?= $absensi['status'] == 'Hadir' ? 'selected' : ''; ?>>Hadir</option>
                    <option value="Alfa" <?= $absensi['status'] == 'Alfa' ? 'selected' : ''; ?>>Alfa</option>
                    <option value="izin" <?= $absensi['status'] == 'izin' ? 'selected' : ''; ?>>Izin</option>
                    <option value="sakit" <?= $absensi['status'] == 'sakit' ? 'selected' : ''; ?>>Sakit</option>
                </select>
            </div>

            <button type="submit">Update</button>
        </form>
    <?php endif; ?>
</div>
</body>
</html>

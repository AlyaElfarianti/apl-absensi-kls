<?php 
include 'lib/koneksi.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $id_siswa = $_POST['id_siswa'];
    $tanggal = $_POST['tanggal'];
    $status = $_POST['status'];

    $sql = "INSERT INTO absensi (id_siswa, tanggal,status) VALUES (:id_siswa, :tanggal, :status)";
    $stmt = $pdo->prepare($sql);
    $stmt->execute(['id_siswa' => $id_siswa, 'tanggal' => $tanggal,'status' => $status]);
    echo "<div class='success-msg'>Data berhasil ditambahkan!</div>";
}
$siswa = $pdo->query("SELECT *FROM siswa")->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Input Absensi Kelas</title>
    <style>
    /* Gaya keseluruhan */
    body {
        font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
        background-color: #eef2f5;
        margin: 0;
        padding: 0;
        display: flex;
        justify-content: center;
        align-items: center;
        height: 100vh;
        flex-direction: column;
    }

    .form-container {
        background-color: #ffffff;
        padding: 25px 35px;
        border-radius: 12px;
        box-shadow: 0 8px 20px rgba(0, 0, 0, 0.1);
        width: 100%;
        max-width: 450px;
    }

    h3 {
        text-align: center;
        color: #2c3e50;
        font-size: 24px;
        margin-bottom: 20px;
    }

    label {
        font-size: 14px;
        color: #34495e;
        margin-bottom: 10px;
        display: block;
    }

    select, input[type="text"], input[type="date"] {
        width: 100%;
        padding: 12px;
        margin-bottom: 20px;
        border: 1px solid #dfe6e9;
        border-radius: 8px;
        font-size: 14px;
        box-sizing: border-box;
        background-color: #f9fbfc;
    }

    select:focus, input:focus {
        border-color: #3498db;
        outline: none;
        box-shadow: 0 0 4px rgba(52, 152, 219, 0.5);
    }

    .add-btn, .back-btn {
        width: 100%;
        padding: 12px;
        border: none;
        color: #ffffff;
        font-size: 16px;
        border-radius: 8px;
        cursor: pointer;
        transition: background-color 0.3s ease, transform 0.2s ease;
        font-weight: bold;
    }

    .add-btn {
        background-color: #3498db;
    }

    .add-btn:hover {
        background-color: #2980b9;
        transform: translateY(-2px);
    }

    .back-btn {
        background-color: #95a5a6;
        margin-top: 10px;
    }

    .back-btn:hover {
        background-color: #7f8c8d;
        transform: translateY(-2px);
    }

    .success-msg {
        text-align: center;
        margin-top: 20px;
        color: #27ae60;
        font-size: 15px;
        background-color: #d4edda;
        padding: 10px;
        border-radius: 8px;
        border: 1px solid #c3e6cb;
        width: 100%;
        max-width: 450px;
    }
</style>

</head>
<body>

<form method="POST">
    <div class="form-container">
        <h3>Input Absensi Kelas</h3>
        <label for="id_siswa">Nama siswa:</label>
       <select name="id_siswa" id="id_siswa" required>
        <?php foreach($siswa as $row):?>
            <option value="<?=$row['id']; ?>"><?= $row['nama']; ?></option>
            <?php endforeach?>
       </select>
                                                                                                                  
        <label for="kelas">Tanggal</label>
        <input type="date" name="tanggal"  id="tanggal" required>

        <label for="status">status:</label>
        <select name="status" id="status" required>
            <option value="Hadir">Hadir</option>
            <option value="izin">Izin</option>
            <option value="sakit">Sakit</option>
            <option value="alfa">Alfa</option>
        </select>

        <button type="submit" class="add-btn">Tambah</button>
    </div>
</form>

<!-- Tombol Kembali -->
<a href="index.php"><button class="back-btn">Kembali</button></a>

</body>
</html>

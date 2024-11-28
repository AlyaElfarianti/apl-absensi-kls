<?php 
include 'lib/koneksi.php'; // Pastikan koneksi ke database sudah benar
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Buat Akun</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f4f6f9;
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 50px;
        }
        .form-container {
            background: #ffffff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
        }
        .form-container h2 {
            text-align: center;
            margin-bottom: 20px;
            font-size: 24px;
            font-weight: bold;
            color: #333;
        }
        .form-container label {
            font-weight: bold;
            color: #555;
        }
        .form-container .btn-primary {
            background-color: #007bff;
            border: none;
        }
        .form-container .btn-primary:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-md-4">
            <div class="form-container">
                <h2>Buat Akun</h2>
                <form method="POST">
                    <div class="mb-3">
                        <label for="nm" class="form-label">Nama</label>
                        <input type="text" class="form-control" id="nm" name="nm" placeholder="Masukkan nama" required>
                    </div>
                    <div class="mb-3">
                        <label for="eml" class="form-label">Email</label>
                        <input type="email" class="form-control" id="eml" name="eml" placeholder="Masukkan email" required>
                    </div>
                    <div class="d-grid">
                        <button type="submit" name="btn" class="btn btn-primary">Daftar</button>
                    </div>
                </form>
                <?php 
if (isset($_POST['btn'])) {
    $username = $_POST['nm'];
    $email = $_POST['eml'];

    try {
        // Periksa apakah pengguna sudah ada di database
        $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username OR email = :email");
        $stmt->bindParam(':username', $username);
        $stmt->bindParam(':email', $email);
        $stmt->execute();

        if ($stmt->rowCount() > 0) {
            echo "<div class='alert alert-danger mt-3'>Username atau email sudah terdaftar. Silakan gunakan yang lain.</div>";
        } else {
            // Masukkan data baru ke database
            $insert = $pdo->prepare("INSERT INTO user (username, email) VALUES (:username, :email)");
            $insert->bindParam(':username', $username);
            $insert->bindParam(':email', $email);

            if ($insert->execute()) {
                echo "<div class='alert alert-success mt-3'>Akun berhasil dibuat! Mengarahkan ke halaman login...</div>";
                echo "<script>
                    setTimeout(function() {
                        window.location.href = 'login.php';
                    }, 2000);
                </script>";
            } else {
                echo "<div class='alert alert-danger mt-3'>Terjadi kesalahan saat menyimpan data. Coba lagi nanti.</div>";
            }
        }
    } catch (PDOException $e) {
        echo "<div class='alert alert-danger mt-3'>Error: " . htmlspecialchars($e->getMessage()) . "</div>";
    }
}
?>
            </div>
        </div>
    </div>
</div>
</body>
</html>

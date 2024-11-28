<?php 
include 'lib/koneksi.php'; 
// session_start(); // Tambahkan session_start()
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #eef2f5;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            margin: 0;
        }

        .form-container {
            background: #ffffff;
            padding: 30px;
            border-radius: 12px;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
            max-width: 400px;
            width: 100%;
        }

        .form-container h2 {
            text-align: center;
            font-size: 26px;
            color: #2c3e50;
            margin-bottom: 20px;
        }

        .form-container .form-label {
            font-weight: bold;
            color: #34495e;
        }

        .form-container .btn-primary {
            background-color: #3498db;
            border: none;
        }

        .form-container .btn-primary:hover {
            background-color: #2980b9;
        }

        .form-container .alert {
            margin-top: 20px;
            text-align: center;
        }

        .register-link {
            text-align: center;
            margin-top: 15px;
            font-size: 14px;
        }

        .register-link a {
            color: #3498db;
            text-decoration: none;
        }

        .register-link a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
<div class="form-container">
    <h2>Login</h2>
    <form method="POST">
        <div class="mb-3">
            <label for="username" class="form-label">Nama</label>
            <input type="text" class="form-control" id="username" name="username" placeholder="Masukkan nama" required>
        </div>
        <div class="mb-3">
            <label for="email" class="form-label">Email</label>
            <input type="email" class="form-control" id="email" name="email" placeholder="Masukkan email" required>
        </div>
        <div class="d-grid">
            <button type="submit" name="login" class="btn btn-primary">Login</button>
        </div>
    </form>

    <div class="register-link">
        <p>Belum punya akun? <a href="user.php">Daftar sekarang</a></p>
    </div>

    <?php
    if (isset($_POST['login'])) {
        $username = $_POST['username'];
        $email = $_POST['email'];

        try {
            // Pastikan koneksi ke database berhasil
            if (!$pdo) {
                throw new Exception("Koneksi database gagal.");
            }

            // Query untuk mengecek data
            $stmt = $pdo->prepare("SELECT * FROM user WHERE username = :username AND email = :email");
            $stmt->bindParam(':username', $username);
            $stmt->bindParam(':email', $email);
            $stmt->execute();

            // Jika pengguna ditemukan
            if ($stmt->rowCount() > 0) {
                // Simpan data pengguna ke sesi
                $_SESSION['iduser'] = $stmt->fetch(PDO::FETCH_ASSOC);

                // Redirect ke halaman index.php menggunakan header
                header('Location:/index.php');
                exit();
            } else {
                echo "<div class='alert alert-danger'>Nama atau email tidak terdaftar. Silakan daftar terlebih dahulu.</div>";
            }
        } catch (Exception $e) {
            // Tangani error
            echo "<div class='alert alert-danger'>Terjadi kesalahan: " . htmlspecialchars($e->getMessage()) . "</div>";
        }
    }
?>

</div>
</body>
</html>

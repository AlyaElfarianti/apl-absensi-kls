<?php
// session_start(); // Mulai session

// Cek apakah pengguna sudah login
if (isset($_SESSION['user'])) {
    // Menampilkan nama pengguna yang sedang login (optional)
    echo "Selamat datang, " . $_SESSION['user']['username'];

    // Tombol Logout
    echo "<a href='logout.php'>Logout</a>";
} else {
    // Jika belum login, arahkan ke halaman login
    header('Location: login.php');
    exit();
}
?>

<?php 
include 'lib/koneksi.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Query untuk menghapus data berdasarkan ID
    $sql = "DELETE FROM absensi WHERE id = :id";
    $stmt = $pdo->prepare($sql);

    try {
        $stmt->execute([':id' => $id]);
        
        // Setelah berhasil, arahkan ke halaman daftar
        header('Location:?page=absensi');
        exit();
    } catch (PDOException $e) {
        echo "Error: " . $e->getMessage();
    }
} else {
    echo "ID tidak diberikan!";
}

// Tidak perlu $pdo->close(), koneksi PDO akan otomatis ditutup
?>

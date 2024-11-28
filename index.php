<?php 
session_start();
include "lib/koneksi.php";
if (!isset($_SESSION['iduser'])) {
   include "login.php";
   exit();
} else {
    // $sqluser = $pdo->prepare("SELECT*FROM user WHERE id='$_SESSION[iduser]'");
    // $sqluser = $pdo->prepare("SELECT*FROM user WHERE id='$_SESSION[iduser]'");

    // $resultuser = $sqluser->fetch(PDO::FETCH_ASSOC);
    // Sekarang $resultuser dapat diakses sebagai array asosiatif
    // Contoh: echo $resultuser['username'];

// Pastikan $_SESSION['iduser'] sudah ada dan bukan array yang tidak diinginkan
if (isset($_SESSION['iduser'])) {
  $iduser = $_SESSION['iduser'];  // Pastikan ini adalah nilai yang benar (bukan array)

  // Query menggunakan prepared statement
  $sqluser = $pdo->prepare("SELECT * FROM user WHERE id = :iduser");
  $sqluser->bindParam(':iduser', $iduser, PDO::PARAM_INT);
  $sqluser->execute();

  // Proses data dari query
  if ($sqluser->rowCount() > 0) {
      // Ambil data pengguna
      $user = $sqluser->fetch(PDO::FETCH_ASSOC);
      // Lakukan sesuatu dengan data pengguna, misalnya tampilkan nama
      // echo "Nama pengguna: " . $user['username'];
  } else {
      echo "Pengguna tidak ditemukan.";
  }
} else {
  echo "ID pengguna tidak ditemukan dalam session.";
}

?>








<?php 
     $page = isset ($_GET['page'])?$_GET['page']:null;
     if (isset($page)) {
      
      if ($page=='update') {
        include"modul/update.php";
      }
        if ($page=='tambah') {
          include"modul/input-siswa.php";
        }
        if ($page=='absensi') {
            include"modul/lihat-absensi.php";
          }
          
          if ($page=='tmabsen') {
            include"modul/input_absen.php";
          }
          if ($page=='hapus') {
            include"modul/hapus.php";
          }
          if ($page=='keluar') {
            include"modul/keluar.php";
          }
        

     }else{
      include"modul/default.php";
     }

     
  ?>

<?php }?>
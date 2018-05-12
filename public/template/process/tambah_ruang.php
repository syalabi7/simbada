<?php
  if(isset($_POST['tambah_ruang'])){
  include '../config/config.php';

    $nama_ruang = $_POST['nama_ruang'];

    $query = "INSERT INTO ruang (nama_ruang)
          VALUES('$nama_ruang')";
        $result = mysqli_query($conn,$query);

        if(isset($result)){
          header('Location: ../pages/views/ruang.php');
        } else {
          header('Location: ../pages/views/ruang.php');
          echo "Gagal menambahkan data";
        }
    
  } else{  //jika tidak terdeteksi tombol tambah di klik
 
  //redirect atau dikembalikan ke halaman tambah
  echo '<script>window.history.back()</script>';
 
  }
?>
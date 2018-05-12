<?php
  if(isset($_POST['tambah_kategori'])){
  include '../config/config.php';

    $kategori = $_POST['kategori'];

    $query = "INSERT INTO kategori (kategori)
          VALUES('$kategori')";
        $result = mysqli_query($conn,$query);

        if(isset($result)){
          header('Location: ../pages/views/kategori.php');
        } else {
          header('Location: ../pages/views/kategori.php');
          echo "Gagal menambahkan data";
        }
    
  } else{  //jika tidak terdeteksi tombol tambah di klik
 
  //redirect atau dikembalikan ke halaman tambah
  echo '<script>window.history.back()</script>';
 
  }
?>
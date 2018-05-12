<?php
include "config.php";

if(isset($_POST['import'])){ // Jika user mengklik tombol Import
  $nama_file_baru = 'cobajadeh.xlsx';

  // Cek apakah terdapat file data.xlsx pada folder tmp
  if(is_file('tmp/'.$nama_file_baru)) // Jika file tersebut ada
    unlink('tmp/'.$nama_file_baru); // Hapus file tersebut
  
  $tipe_file = $_FILES['file']['type']; // Ambil tipe file yang akan diupload
  $tmp_file = $_FILES['file']['tmp_name'];
  
  // Load librari PHPExcel nya
  require_once 'PHPExcel/PHPExcel.php';

  move_uploaded_file($tmp_file, 'tmp/'.$nama_file_baru);
  
  $excelreader = new PHPExcel_Reader_Excel2007();
  $loadexcel = $excelreader->load('tmp/'.$nama_file_baru); // Load file excel yang tadi diupload ke folder tmp
  $sheet = $loadexcel->getActiveSheet()->toArray(null, true, true ,true);
  
  $numrow = 1;
  foreach($sheet as $row){
    // Ambil data pada excel sesuai Kolom
    $nama_aset = $row['F']; // Ambil data NIS
    $merk = $row['G']; // Ambil data nama
    $tahun = $row['H']; // Ambil data jenis kelamin
    $keterangan = $row['I']; // Ambil data telepon
    $nilai_barang = $row['J']; // Ambil data alamat
    $id_lokasi = $row['D'];
    $id_kategori = $row['E'];
    $id_sumber = $row['K'];
    $id_kondisi = $row['L'];
    
    // Cek $numrow apakah lebih dari 1
    // Artinya karena baris pertama adalah nama-nama kolom
    // Jadi dilewat saja, tidak usah diimport
    if($numrow > 1){
      // Proses simpan ke Database

      $sql = "INSERT INTO asets VALUES ('', '$nama_aset','$merk','$tahun','$keterangan','$nilai_barang', $id_lokasi, $id_kategori, $id_sumber, $id_kondisi, '', '')";
      mysqli_query($conn, $sql);
    }
    
    $numrow++; // Tambah 1 setiap kali looping
  }
}
header('location: http://localhost/wati/simbada/public/asets'); // Redirect ke halaman awal
?>
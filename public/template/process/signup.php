<?php
  if(isset($_POST['register'])){
  include '../config/config.php';

    $name = $_POST['name'];
    $username = $_POST['username'];
    $password = sha1(md5($_POST['password']));
    $conpassword = sha1(md5($_POST['conpassword']));

    $sql = "SELECT * FROM admin WHERE (username='$username')";
 
    $check = mysqli_fetch_array(mysqli_query($conn,$sql));

    if(isset($check)){
      header('Location: ../pages/views/sign-up.php');
      echo "email alredy eksis";
    }else{
      if ($password == $conpassword) {
        date_default_timezone_set('Asia/Jakarta');

        function hari_ini() {
          $hari = date ("D");
         
          switch($hari){
            case 'Sun':
              $hari_ini = "Minggu";
            break;
         
            case 'Mon':     
              $hari_ini = "Senin";
            break;
         
            case 'Tue':
              $hari_ini = "Selasa";
            break;
         
            case 'Wed':
              $hari_ini = "Rabu";
            break;
         
            case 'Thu':
              $hari_ini = "Kamis";
            break;
         
            case 'Fri':
              $hari_ini = "Jumat";
            break;
         
            case 'Sat':
              $hari_ini = "Sabtu";
            break;
            
            default:
              $hari_ini = "Tidak di ketahui";   
            break;
          }
          return $hari_ini;

        }

        function tgl_indo($tanggal){
          $bulan = array (
            1 =>   'Januari',
            'Februari',
            'Maret',
            'April',
            'Mei',
            'Juni',
            'Juli',
            'Agustus',
            'September',
            'Oktober',
            'November',
            'Desember'
          );
          $pecahkan = explode('-', $tanggal);
          
          // variabel pecahkan 0 = tanggal
          // variabel pecahkan 1 = bulan
          // variabel pecahkan 2 = tahun
         
          return $pecahkan[2] . ' ' . $bulan[ (int)$pecahkan[1] ] . ' ' . $pecahkan[0];
        }

        $create_at = hari_ini() . ', ' . tgl_indo(date('Y-m-d'));

        $query = "INSERT INTO admin (name, username, password, create_at, update_at)
          VALUES('$name', '$username', '$password', '$create_at', '$create_at')";
        $result = mysqli_query($conn,$query);

        if(isset($result)){
          header('Location: ../pages/views/sign-in.php');
        } else {
          header('Location: ../pages/views/sign-up.php');
          echo "Gagal menambahkan data";
        }
      } else {
          header('Location: ../pages/views/sign-up.php');
        echo "password harus sama";
      }
    }
  } else{  //jika tidak terdeteksi tombol tambah di klik
 
  //redirect atau dikembalikan ke halaman tambah
  echo '<script>window.history.back()</script>';
 
  }
?>
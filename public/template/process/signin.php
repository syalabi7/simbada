<?php
  	if(isset($_POST['login'])){
	  	include '../config/config.php';

	  	$username = $_POST['username'];
	    $password = sha1(md5($_POST['password']));
	 
		$sql = "SELECT * FROM admin WHERE username='$username' and password='$password'";

	    $check = mysqli_num_rows(mysqli_query($conn,$sql));
 
		if($check > 0){
			session_start();			
			$_SESSION['basic_is_logged_in'] = true;
			$_SESSION['username'] = $username;
			$_SESSION['status'] = "login";

			$row = mysqli_fetch_assoc(mysqli_query($conn,$sql));
			$_SESSION['id'] = $row['id'];
			$_SESSION['name'] = $row['name'];

			header("location:../index.php");
		} else{
			$_SESSION['basic_is_logged_in'] = false;
          header('Location: ../pages/views/sign-in.php');
		}

  	} else{  //jika tidak terdeteksi tombol tambah di klik
 
  	//redirect atau dikembalikan ke halaman tambah
  	echo '<script>window.history.back()</script>';
 
	}
?>
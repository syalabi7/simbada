<?php 
	session_start();
	session_destroy();
    header('Location: ../pages/views/sign-in.php');
?>
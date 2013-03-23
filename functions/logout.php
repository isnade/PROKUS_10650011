<?php
	//session_start();
	unset($_SESSION['sebagai']);
	unset($_SESSION['nama']);
	unset($_SESSION['pass']);
	echo "<script>alert('Anda Sudah Logout');document.location='home';</script>";
?>
<?php
	session_start();
	if(file_exists("configuration/koneksi.php")){
		include "configuration/koneksi.php";
	}else if(file_exists("../configuration/koneksi.php")){
		include "../configuration/koneksi.php";
	}
	if (isset($_POST['submit'])){
		$user = $_POST['username'];
		$pass = md5($_POST['password']);
		$sbg = $_POST['sebagai'];
		
		if(($user=='')or($pass=='')or($sbg=='')){
			echo "<script>alert('Harap isi semuanya terlebih dahulu');document.location='../';</script>";
		}else{
			$query=mysql_query("SELECT * FROM $sbg WHERE id_$sbg ='$user' AND password='$pass'");
			$row=mysql_num_rows($query);
			if($row == 1){
				$_SESSION['sebagai'] = $sbg;
				$_SESSION['nama'] = $user;
				$_SESSION['pass'] = $pass;
				echo "<script>alert('Selamat Datang $sbg');document.location='../home';</script>";
			}else{
				echo "<script>alert('Maaf data tidak ditemukan');document.location='../';</script>";
			}
		}
	}
?>
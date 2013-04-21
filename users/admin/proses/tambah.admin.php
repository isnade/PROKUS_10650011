<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$id = $_POST['id_admin'];
		$pass = md5($_POST['id_admin']);
		$nama = $_POST['nama'];
		$insert = mysql_query("INSERT INTO admin(id_admin,nm_admin,password) values('$id','$nama','$pass')");
		if($insert){
			echo "<script>alert('Data admin berhasil ditambah');document.location='../../../admin';</script>";
		}else{
			echo "<script>alert('Data admin gagal ditambah');document.location='../../../admin';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>
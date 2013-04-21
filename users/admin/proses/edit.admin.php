<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$id = $_POST['id'];
		$nama = $_POST['nama'];
		$pass = md5($_POST['password']);
		$edit = mysql_query("UPDATE admin SET id_admin='$id',nm_admin='$nama',password='$pass' WHERE id_admin='$id'");
		if($edit){
			echo "<script>alert('Data berhasil diubah');document.location='../../../admin';</script>";
		}else{
			echo "<script>alert('Data gagal diubah');document.location='../../../admin-$id-edit';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}
?>
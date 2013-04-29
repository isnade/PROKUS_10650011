<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$kd_mapel = $_POST['kd_mapel'];
		$nm_mapel = $_POST['nm_mapel'];
		$kd_kelas = $_POST['kd_kelas'];
		$kd = $_POST['kd_guru'];
		$edit = mysql_query("UPDATE mapel SET kd_mapel='$kd_mapel',nm_mapel='$nm_mapel',kd_kelas='$kd_kelas',kd_guru='$kd' WHERE kd_mapel='$kd_mapel'");
		if($edit){
			echo "<script>alert('Data berhasil diubah');document.location='../../../mapel';</script>";
		}else{
			echo "<script>alert('Data gagal diubah');document.location='../../../mapel-$id-edit';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}
?>
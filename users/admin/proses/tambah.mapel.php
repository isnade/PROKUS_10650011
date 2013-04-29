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
		$insert = mysql_query("INSERT INTO mapel(kd_mapel,nm_mapel,kd_kelas,kd_guru) values('$kd_mapel','$nm_mapel','$kd_kelas','$kd')");
		if($insert){
			echo "<script>alert('Data mapel berhasil ditambah');document.location='../../../mapel';</script>";
		}else{
			echo "<script>alert('Data mapel gagal ditambah');document.location='../../../mapel';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>
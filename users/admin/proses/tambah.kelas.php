<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$kd_kelas = $_POST['kd_kelas'];
		$id_siswa = $_POST['id_siswa'];
		$kelas = $_POST['kelas'];
		$thn_ajaran = $_POST['thn_ajaran'];
		$insert = mysql_query("INSERT INTO kelas(kd_kelas,id_siswa,kelas,thn_ajaran) values('$kd_kelas','$id_siswa','$kelas','$thn_ajaran')");
		if($insert){
			echo "<script>alert('Data kelas berhasil ditambah');document.location='../../../kelas';</script>";
		}else{
			echo "<script>alert('Data kelas gagal ditambah');document.location='../../../kelas';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>
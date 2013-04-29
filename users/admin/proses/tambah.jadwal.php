<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$kd_kelas = $_POST['kd_kelas'];
		$kd_mapel = $_POST['kd_mapel'];
		$hari = $_POST['hari'];
		$jam = $_POST['jam'];
		$kd = $_POST['kd_guru'];
		$ruang = $_POST['ruang'];
		$thn_ajaran = $_POST['thn_ajaran'];
		$insert = mysql_query("INSERT INTO jadwal(kd_kelas,kd_mapel,hari,jam,kd_guru,ruang,thn_ajaran) values('$kd_kelas','$kd_mapel','$hari','$jam','$kd','$ruang','$thn_ajaran')");
		if($insert){
			echo "<script>alert('Data jadwal berhasil ditambah');document.location='../../../jadwal';</script>";
		}else{
			echo "<script>alert('Data jadwal gagal ditambah');document.location='../../../jadwal';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>
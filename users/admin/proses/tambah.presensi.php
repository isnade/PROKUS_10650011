<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$id = $_POST['id'];
		$kd_kelas = $_POST['kd_kelas'];
		$bln = $_POST['bulan'];
		$hadir = $_POST['hadir'];
		$jml_sakit = $_POST['jml_sakit'];
		$jml_izin = $_POST['jml_izin'];
		$jml_alpa = $_POST['jml_alpa'];
		$thn_ajaran = $_POST['thn_ajaran'];
		$insert = mysql_query("INSERT INTO absensi(id_siswa,kd_kelas,bln,hadir,jml_sakit,jml_izin,jml_alpa,thn_ajaran)
		values('$id','$kd_kelas','$bln','$hadir','$jml_sakit','$jml_izin','$jml_alpa','$thn_ajaran')");
		if($insert){
			echo "<script>alert('Data presensi berhasil ditambah');document.location='../../../presensi';</script>";
		}else{
			echo "<script>alert('Data presensi gagal ditambah');document.location='../../../presensi';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>
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
		$edit = mysql_query("UPDATE absensi SET kd_kelas='$kd_kelas',bln='$bln',hadir='$hadir',jml_sakit='$jml_sakit',jml_izin='$jml_izin',jml_alpa='$jml_alpa',thn_ajaran='$thn_ajaran' WHERE id_siswa='$id'");
		if($edit){
			echo "<script>alert('Data berhasil diubah');document.location='../../../presensi';</script>";
		}else{
			echo "<script>alert('Data gagal diubah');document.location='../../../presensi-$id-edit';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}
?>
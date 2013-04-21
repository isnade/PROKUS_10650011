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
		$edit = mysql_query("UPDATE kelas SET kd_kelas='$kd_kelas',id_siswa='$id_siswa',kelas='$kelas',thn_ajaran='$thn_ajaran' WHERE kd_kelas='$kd_kelas'");
		if($edit){
			echo "<script>alert('Data berhasil diubah');document.location='../../../kelas';</script>";
		}else{
			echo "<script>alert('Data gagal diubah');document.location='../../../kelas-$kd_kelas-edit';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}
?>
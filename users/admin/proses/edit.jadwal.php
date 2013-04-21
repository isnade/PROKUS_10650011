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
		$id_guru = $_POST['id_guru'];
		$ruang = $_POST['ruang'];
		$thn_ajaran = $_POST['thn_ajaran'];
		$edit = mysql_query("UPDATE jadwal SET kd_kelas='$kd_kelas',kd_mapel='$kd_mapel',hari='$hari',jam='$jam',id_guru='$id_guru',ruang='$ruang',thn_ajaran='$thn_ajaran' WHERE kd_kelas='$kd_kelas'");
		if($edit){
			echo "<script>alert('Data berhasil diubah');document.location='../../../jadwal';</script>";
		}else{
			echo "<script>alert('Data gagal diubah');document.location='../../../jadwal-$kd_kelas-edit';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}
?>
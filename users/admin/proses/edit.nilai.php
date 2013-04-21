<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$id = $_POST['id'];
		$thn_ajaran = $_POST['thn_ajaran'];
		$sem = $_POST['semester'];
		$kd_mapel = $_POST['kd_mapel'];
		$kd_kelas = $_POST['kd_kelas'];
		$kkm = $_POST['kkm'];
		$ulangan_1 = $_POST['ulangan_1'];
		$ulangan_2 = $_POST['ulangan_2'];
		$ulangan_3 = $_POST['ulangan_3'];
		$mid_sem = $_POST['mid_sem'];
		$uas = $_POST['uas'];
		$nilai_rapor = $_POST['nilai_rapor'];
		$edit = mysql_query("UPDATE nilai SET thn_ajaran='$thn_ajaran',semester='$sem',kd_mapel='$kd_mapel',kd_kelas='$kd_kelas',kkm='$kkm',ulangan_1='$ulangan_1',ulangan_2='$ulangan_2',ulangan_3='$ulangan_3',mid_sem='$mid_sem',uas='$uas',nilai_rapor='$nilai_rapor' WHERE id_siswa='$id'");
		if($edit){
			echo "<script>alert('Data berhasil diubah');document.location='../../../nilai';</script>";
		}else{
			echo "<script>alert('Data gagal diubah');document.location='../../../nilai-$id-edit';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}
?>
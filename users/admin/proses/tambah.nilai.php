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
		$insert = mysql_query("INSERT INTO nilai(id_siswa,thn_ajaran,semester,kd_mapel,kd_kelas,kkm,ulangan_1,ulangan_2,ulangan_3,mid_sem,uas,nilai_rapor)
		values('$id','$thn_ajaran','$sem','$kd_mapel','$kd_kelas','$kkm','$ulangan_1','$ulangan_2','$ulangan_3','$mid_sem','$uas','$nilai_rapor')");
		if($insert){
			echo "<script>alert('Data nilai berhasil ditambah');document.location='../../../nilai';</script>";
		}else{
			echo "<script>alert('Data nilai gagal ditambah');document.location='../../../nilai';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>
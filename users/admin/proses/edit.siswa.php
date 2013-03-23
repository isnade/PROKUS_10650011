<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$id = $_POST['id_siswa'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];
		$edit = mysql_query("UPDATE siswa SET nm_siswa='$nama',alamat='$alamat',jk='$jk' WHERE id_siswa='$id'");
		if($edit){
			echo "<script>alert('Data berhasil diubah');document.location='../../../siswa';</script>";
		}else{
			echo "<script>alert('Data gagal diubah');document.location='../../../siswa-$id-edit';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>
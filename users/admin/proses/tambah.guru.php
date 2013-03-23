<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$id = $_POST['id_guru'];
		$pass = md5($_POST['id_guru']);
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];
		$insert = mysql_query("INSERT INTO guru(id_guru,nm_guru,password,alamat,jk) values('$id','$nama','$pass','$alamat','$jk')");
		if($insert){
			echo "<script>alert('Data Guru berhasil ditambah');document.location='../../../guru';</script>";
		}else{
			echo "<script>alert('Data guru gagal ditambah');document.location='../../../guru';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>
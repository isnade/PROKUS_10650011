<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$id = $_POST['id_guru'];
		$kd = $_POST['kd_guru'];
		$pass = md5($_POST['id_guru']);
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];
		$agama = $_POST['agama'];
		$tempat_lahir = $_POST['tempat'];
		$tgl = $_POST['tanggal'];
		$bln = $_POST['bulan'];
		$thn = $_POST['tahun'];
		$status = $_POST['status'];
		$ket = $_POST['ket'];
		$insert = mysql_query("INSERT INTO guru(id_guru,kd_guru,nm_guru,password,alamat,jk,agama,tempat_lahir,tgl_lahir,status,keterangan) values('$id','$kd','$nama','$pass','$alamat','$jk','$agama','$tempat_lahir','$thn''$bln''$tgl','$status','$ket')");
		if($insert){
			echo "<script>alert('Data Guru berhasil ditambah');document.location='../../../guru';</script>";
		}else{
			echo "<script>alert('Data guru gagal ditambah');document.location='../../../guru';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>
<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$id = $_POST['id_guru'];
		$kd = $_POST['kd_guru'];
		$pass = md5($_POST['pass']);
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
		$edit = mysql_query("UPDATE guru SET nm_guru='$nama',kd_guru='$kd',password='$pass',agama='$agama',alamat='$alamat',jk='$jk',tempat_lahir='$tempat_lahir',tgl_lahir='$thn''$bln''$tgl',status='$status',keterangan='$ket' WHERE id_guru='$id'");
		if($edit){
			echo "<script>alert('Data berhasil diubah');document.location='../../../guru';</script>";
		}else{
			echo "<script>alert('Data gagal diubah');document.location='../../../guru-$id-edit';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>
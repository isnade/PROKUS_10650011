<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$id = $_POST['id_siswa'];
		$pass = md5($_POST['id_siswa']);
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];
		$agama = $_POST['agama'];
		$nma = $_POST['nm_ayah'];
		$nmi = $_POST['nm_ibu'];
		$nmw = $_POST['nm_wali'];
		$pka = $_POST['pekerjaan_ayah'];
		$pki = $_POST['pekerjaan_ibu'];
		$pkw = $_POST['pekerjaan_wali'];
		$tingkat = $_POST['diterima_ditingkat'];
		$ditertgl = $_POST['diterima_tanggal'];
		$nosttb = $_POST['no_sttb'];
		$thnsttb = $_POST['tahun_sttb'];
		$anakke = $_POST['anak_ke'];
		$insert = mysql_query("insert into siswa(id_siswa,nm_siswa,password,angkatan,alamat,jk,agama,nm_ayah,nm_ibu,nm_wali,pekerjaan_ayah,pekerjaan_ibu,pekerjaan_wali,diterima_ditingkat,diterima_tanggal,no_sttb,tahun_sttb,anak_ke)
		values('$id','$nama','$pass','$angk','$alamat','$jk','$agama','$nma','$nmi','$nmw','$pka','$pki','$pkw')");
		if($insert){
			echo "<script>alert('Data Siswa berhasil ditambah');document.location='../../../siswa';</script>";
		}else{
			echo "<script>alert('Data Siswa gagal ditambah');document.location='../../../siswa';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>
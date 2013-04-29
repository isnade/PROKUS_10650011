<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$id = $_POST['id_siswa'];
		$nisn = $_POST['nisn'];
		$pass = md5($_POST['id_siswa']);
		$angk = $_POST['angkatan'];
		$nama = $_POST['nama'];
		$alamat = $_POST['alamat'];
		$jk = $_POST['jk'];
		$tempat_lahir = $_POST['tempat'];
		$tgl = $_POST['tanggal'];
		$bln = $_POST['bulan'];
		$thn = $_POST['tahun'];
		$agama = $_POST['agama'];
		$nma = $_POST['nm_ayah'];
		$nmi = $_POST['nm_ibu'];
		$nmw = $_POST['nm_wali'];
		$pka = $_POST['pekerjaan_ayah'];
		$pki = $_POST['pekerjaan_ibu'];
		$pkw = $_POST['pekerjaan_wali'];
		$pha = $_POST['pekerjaan_ayah'];
		$phi = $_POST['pekerjaan_ibu'];
		$phw = $_POST['pekerjaan_wali'];
		$tingkat = $_POST['diterima_ditingkat'];
		$ditertgl = $_POST['diterima_tanggal'];
		$nosttb = $_POST['no_sttb'];
		$thnsttb = $_POST['tahun_sttb'];
		$anakke = $_POST['anak_ke'];
		$nama_file=$_FILES['foto']['name'];
		$uploaddir='./foto_/';
		$alamatfile=$uploaddir.$nama_file;
		$updir='./users/admin/proses/foto_/';
		$url=$updir.$nama_file;
		if (move_uploaded_file($_FILES['foto']['tmp_name'],$alamatfile)){
		$insert = mysql_query("insert into siswa(id_siswa,nm_siswa,nisn,password,angkatan,alamat,jk,tempat_lahir,tgl_lahir,agama,nm_ayah,nm_ibu,nm_wali,pekerjaan_ayah,pekerjaan_ibu,pekerjaan_wali,penghasilan_ayah,penghasilan_ibu,penghasilan_wali,diterima_ditingkat,diterima_tanggal,no_sttb,tahun_sttb,anak_ke,foto)
		values('$id','$nama','$nisn','$pass','$angk','$alamat','$jk','$tempat_lahir','$thn''$bln''$tgl','$agama','$nma','$nmi','$nmw','$pka','$pki','$pkw','$pha','$phi','$phw','$tingkat','$ditertgl','$nosttb','$thnsttb','$anakke','$url')");
		echo "<script>alert('Data siswa berhasil ditambah');document.location='../../../siswa';</script>";
		}else{
			echo "<script>alert('Data siswa gagal ditambah');document.location='../../../siswa';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak berhak untuk mengakses file ini');document.location='../../../home';</script>";
	}
?>
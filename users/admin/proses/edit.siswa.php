<?php
	session_start();
	include "../../../configuration/koneksi.php";
	if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
		$id = $_POST['id_siswa'];
		$pass = md5($_POST['password']);
		$nisn = $_POST['nisn'];
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
		$pha = $_POST['penghasilan_ayah'];
		$phi = $_POST['penghasilan_ibu'];
		$phw = $_POST['penghasilan_wali'];
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
		if (move_uploaded_file($_FILES['foto']['tmp_name'],$alamatfile))
		{
		$edit = mysql_query("UPDATE siswa SET nm_siswa='$nama',nisn='$nisn',password='$pass',alamat='$alamat',jk='$jk',tempat_lahir='$tempat_lahir',tgl_lahir='$thn''$bln''$tgl',angkatan='$angk',agama='$agama',nm_ayah='$nma',nm_ibu='$nmi',nm_wali='$nmw',pekerjaan_ayah='$pka',pekerjaan_ibu='$pki',pekerjaan_wali='$pkw',penghasilan_ayah='$pha',penghasilan_ibu='$phi',penghasilan_wali='$phw',diterima_ditingkat='$tingkat',diterima_tanggal='$ditertgl',no_sttb='$nosttb',tahun_sttb='$thnsttb',anak_ke='$anakke',foto='$url' WHERE id_siswa='$id'");
		echo "<script>alert('Data berhasil diubah');document.location='../../../siswa';</script>";
		}else{
			echo "<script>alert('Data gagal diubah');document.location='../../../siswa-$id-edit';</script>";
		}
	}else{
		echo "<script>alert('Anda tidak punya hak untuk mengakses file ini');document.location='../../../home';</script>";
	}

?>
<?php
include"../configuration/koneksi.php";
if (isset($_POST['keterangan']))
{
	$tanggal;
	$keterangan=ucwords($_POST['keterangan']);
	$nama_file=$_FILES['datafile']['name'];
	$ukuran=$_FILES['datafile']['size'];
	if ($keterangan=="" || $nama_file=="")
	{
		echo "<script>alert('Data Anda belum lengkap');document.location='../materi';</script>";		
	}else{
		$uploaddir='./files/';
		$alamatfile=$uploaddir.$nama_file;
		$updir='./includes/files/';
		$alamat=$updir.$nama_file;
		if (move_uploaded_file($_FILES['datafile']['tmp_name'],$alamatfile))
		{
			echo "<script>alert('Data Anda berhasil diupload');document.location='../materi';</script>";
			$upload=mysql_db_query($db,"INSERT INTO tabel_data(nama_file,ukuran,url,tgl_upload,keterangan) VALUES('$nama_file','$ukuran','$alamat','$tanggal','$keterangan')");
		}else{
			echo "<script>alert('Proses upload gagal');document.location='../materi';</script>";
		}
	}
}
else
{
	unset($_POST['keterangan']);
}
?>

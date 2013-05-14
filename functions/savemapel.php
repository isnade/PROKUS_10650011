<?php
include "../configuration/koneksi.php";
$no = $_POST['no'];
$id_transaksi = $_POST['id_transaksi'];
$id_barang = $_POST['id_barang'];
$id_kasir = $_POST['id_kasir'];
$tgl_transaksi = date("Y-m-d H:i:s");

$query = "insert into transaksi(no,id_transaksi,id_barang,id_kasir,tgl_transaksi) values('$no','$id_transaksi','$id_barang','$id_kasir','$tgl_transaksi')";
if(!mysql_query($query)){
	echo mysql_error();
	exit;
	}
echo "<script>document.location='../transaksi';</script>";
?>
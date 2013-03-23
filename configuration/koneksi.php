<?php
	$host="localhost";
	$user="root";
	$pass="";
	$db="sia";
	$koneksi=mysql_connect($host,$user,$pass);
	if($koneksi){
		$dbname= mysql_select_db($db);
		if(!$dbname){
			echo "Koneksi ke database gagal";
		}
	}else{
		echo "Koneksi ke server gagal";
	}
?>
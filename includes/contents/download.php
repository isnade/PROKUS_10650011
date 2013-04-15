<?php
//session_start();
include "configuration/koneksi.php";

$download=mysql_query("select * from tabel_data");
$cek=mysql_num_rows($download);

if($cek){
	
	?>
	<h2 align="center">Download Files</h2>
	<table class="datatable" align="center">
		<tr>
			<th>No</th>
			<th>Nama File</th>
			<th>Ukuran (byte)</th>
			<th>Tgl Upload</th>
			<th>Keterangan</th>
			<th>Download</th>
		</tr>
	<?
	while($row=mysql_fetch_array($download)){
		?>
		<tr>
			<td><? echo $cek=$cek+1;?></td>
			<td><?=$row['nama_file'];?></td>
			<td><?=$row['ukuran'];?></td>
			<td><?=$row['tgl_upload'];?></td>
			<td><?=$row['keterangan'];?></td>
			<td><a href="<?=$row['url'];?>"><center><img src="images/download.png" border="0"/><center/></a></td>
		</tr>
		<?
	}
	?>
	</table>
	<?
}else{
	echo "<font color=red><center><b>Belum Ada Data!!</b><center</font>";
}
?>
<div id="content">
    <div class="content_box">
      NIS :
	  Nama :
	  Kelas :
	<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				echo "Maaf, anda tidak punya izin untuk melihat menu ini.";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
				if(!isset($_GET['proses'])){
					echo "
					<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th width=\"20%\" style=\"border:1px solid #000;\">
							NIS
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							Nama
						</th>
						<th width=\"15%\" style=\"border:1px solid #000;\">
							Kelas
						</th>
						<th width=\"15%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"anggota-order-telepon-desc\"><img src=\"images/top.png\"/></a>Telepon
							<a style=\"float:right;\" href=\"anggota-order-telepon-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">Proses</th>
					</tr>";
						if(!isset($_GET['order'])){
							$anggota = mysql_query("SELECT * FROM anggota ");
						}else{
							$order = addslashes($_GET['order']);
							$sort = addslashes($_GET['sort']);
							$anggota = mysql_query("SELECT * FROM anggota ORDER BY $order $sort");
						}
						$mulai=1;
						while($a = mysql_fetch_array($anggota)){
							if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"border:1px solid #000;\">$a[id_anggota]</td>
							<td style=\"border:1px solid #000;\">$a[nama_anggota]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[alamat]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[telepon]</td>
							<td style=\"text-align:center;border:1px solid #000;\">
							<a href=\"anggota-$a[id_anggota]-edit\">Edit</a> | <a href=\"anggota-$a[id_anggota]-hapus\">Hapus</a>
							</td></tr>";
							$mulai++;
						}
					echo "</table>";
					?>
					<form action="users/pengurus/proses/tambah.anggota.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table border="1" style="color:#000;">
							<tr class='light'>
								<th colspan='2'><center><h1>Masukan Data Anggota baru</h1></center></th>
							</tr>
							<tr class='dark'>
								<td>Id Anggota</td>
								<td><input class="input" type="text" name="id" /></td>
							</tr>
							<tr class='light'>
								<td>Username</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'>
								<td>Alamat Anggota</td>
								<td><input class="input" type="text" name="alamat"/></td>
							</tr>
							<tr class='light'>
								<td>Telepon</td>
								<td><input class="input" type="text" name="telepon"/></td>
							</tr>
							<tr class='dark'>
								<td></td>
								<td><input type="submit" name="submit" value="Tambah" /></td>
							</tr>
						</table>
					</form>
					<?php
				}else if($_GET['proses']=='edit'){
					if(!isset($_GET['id'])){
						echo "<script>document.location='anggota';</script>";
					}else{
						$id= addslashes($_GET['id']);
						$anggota = mysql_query("SELECT * FROM anggota WHERE id_anggota='$id'");
						$janggota = mysql_num_rows($anggota);
						if($janggota == 1){
							$a = mysql_fetch_array($anggota);?>
							<form action="users/pengurus/proses/edit.anggota.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
								<table border="1" style="color:#000;">
									<tr class='light'>
										<th colspan='2'><center><h1>Data Anggota</h1></center></th>
									</tr>
									<tr class='dark'>
										<td>Id Anggota</td>
										<td><input type="hidden" name="id" value="<?php echo $a['id_anggota']?>"/><?php echo $a['id_anggota'];?></td>
									</tr>
									<tr class='light'>
										<td>Username</td>
										<td><input class='input' type="text" name="nama" value="<?php echo $a['nama_anggota']?>"/></td>
									</tr>
									<tr class='dark'>
										<td>Alamat Anggota</td>
										<td><input class='input' type="text" name="alamat" value="<?php echo $a['alamat']?>"/></td>
									</tr>
									<tr class='light'>
										<td>Telepon</td>
										<td><input class='input' type="text" name="telepon" value="<?php echo $a['telepon']?>"/></td>
									</tr>
									<tr class='dark'>
										<td></td>
										<td><input type="submit" value="Edit" /></td>
									</tr>
								</table>
							</form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='anggota';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['id'])){
						echo "<script>document.location='anggota';</script>";
					}else{
						$id= addslashes($_GET['id']);
						$anggota = mysql_query("SELECT * FROM anggota WHERE id_anggota='$id'");
						$janggota = mysql_num_rows($anggota);
						if($janggota == 1){
							$titip = mysql_query("SELECT id_anggota FROM titip_barang WHERE id_anggota='$id'");
							$jtitip = mysql_num_rows($titip);
							if($jtitip == 0){
								$pengurus = mysql_query("SELECT id_anggota FROM pengurus WHERE id_anggota='$id'");
								$jpengurus = mysql_num_rows($pengurus);
								if($jpengurus ==0){
									$delete = mysql_query("DELETE FROM anggota WHERE id_anggota='$id'");
									if($delete){
										echo "<script>alert('Data berhasil dihapus');document.location='anggota';</script>";
									}else{
										echo "<script>alert('Data gagal dihapus');document.location='anggota';</script>";
									}
								}else{
									echo "<script>alert('Anggota tidak bisa dihapus, Anggota ini sudah menjadi Pengurus.');document.location='anggota';</script>";
								}
							}else{
								echo "<script>alert('Anggota ini masih mempunyai data titip anggota.');document.location='anggota';</script>";
							}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='anggota';</script>";
						}
					}
				}
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'anggota')){
				echo "
					<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th width=\"25%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"anggota-order-id_anggota-desc\"><img src=\"images/top.png\"/></a>ID Anggota
							<a style=\"float:right;\" href=\"anggota-order-id_anggota-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"anggota-order-nama_anggota-desc\"><img src=\"images/top.png\"/></a>Username
							<a style=\"float:right;\" href=\"anggota-order-nama_anggota-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"anggota-order-alamat-desc\"><img src=\"images/top.png\"/></a>Alamat
							<a style=\"float:right;\" href=\"anggota-order-alamat-asc\"><img src=\"images/down.png\"/></a>
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							<a style=\"float:left;\" href=\"anggota-order-telepon-desc\"><img src=\"images/top.png\"/></a>Telepon
							<a style=\"float:right;\" href=\"anggota-order-telepon-asc\"><img src=\"images/down.png\"/></a>
						</th>
					</tr>";
						if(!isset($_GET['order'])){
							$anggota = mysql_query("SELECT * FROM anggota ");
						}else{
							$order = addslashes($_GET['order']);
							$sort = addslashes($_GET['sort']);
							$anggota = mysql_query("SELECT * FROM anggota ORDER BY $order $sort");
						}
						$mulai=1;
						while($a = mysql_fetch_array($anggota)){
							if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"border:1px solid #000;\">$a[id_anggota]</td>
							<td style=\"border:1px solid #000;\">$a[nama_anggota]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[alamat]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[telepon]</td></tr>";
							$mulai++;
						}
					echo "</table>";
			}
			//else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'kasir')){
				//echo "<p class=\"readmore\"><a href=\"register\">Masukan kekeranjang</a></p>";
			//}
			?>
	  <div class="cleaner_h20"></div>
      <div class="image_fl"> <img src="images/images01.jpg" alt="" /> </div>
      <div class="section_w250 float_r">
       
      </div>
      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
  </div>
  <div class="cleaner"></div>
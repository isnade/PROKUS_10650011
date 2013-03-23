<div id="content">
    <div class="content_box">
		<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				echo "Maaf, anda tidak punya izin untuk melihat menu ini.";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
				if(!isset($_GET['proses'])){
					echo "
					<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th width=\"20%\" style=\"border:1px solid #000;\">
							Id Guru (NIP)
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							Nama Guru							
						</th>
						<th width=\"15%\" style=\"border:1px solid #000;\">
							Alamat
						</th>
						<th width=\"15%\" style=\"border:1px solid #000;\">
							Jenis Kelamin
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">Proses</th>
					</tr>";
						if(!isset($_GET['order'])){
							$guru = mysql_query("SELECT * FROM guru ");
						}else{
							$order = addslashes($_GET['order']);
							$sort = addslashes($_GET['sort']);
							$guru = mysql_query("SELECT * FROM guru ORDER BY $order $sort");
						}
						$mulai=1;
						while($a = mysql_fetch_array($guru)){
							if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"border:1px solid #000;\">$a[id_guru]</td>
							<td style=\"border:1px solid #000;\">$a[nm_guru]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[alamat]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[jk]</td>
							<td style=\"text-align:center;border:1px solid #000;\">
							<a href=\"guru-$a[id_guru]-edit\">Edit</a> | <a href=\"guru-$a[id_guru]-hapus\">Hapus</a>
							</td></tr>";
							$mulai++;
						}
					echo "</table>";
					?>
					<form action="users/admin/proses/tambah.guru.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table border="0" style="color:#000;">
							<tr class='light'>
								<th colspan='2'><center><h3>Masukan Data Guru Baru</h3></center></th>
							</tr>
							<tr class='dark'>
								<td>Id Guru (NIP)</td>
								<td><input class="input" type="text" name="id_guru" /></td>
							</tr>
							<tr class='light'>
								<td>Nama Guru</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'>
								<td>Alamat Guru</td>
								<td><input class="input" type="text" name="alamat"/></td>
							</tr>
							<tr class='light'>
								<td>Jenis Kelamin</td>
								<td><select style="padding:4px;solid #000;width:142px;" name="jk">
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
								</select></td>
							</tr>
							<tr class='dark'>
								<td></td>
								<td><input type="submit" name="submit" value="Tambah" /></td>
							</tr>
						</table>
					</form>
					<?php
				}else if($_GET['proses']=='edit'){
					if(!isset($_GET['id_guru'])){
						echo "<script>document.location='guru';</script>";
					}else{
						$id= addslashes($_GET['id_guru']);
						$guru = mysql_query("SELECT * FROM guru WHERE id_guru='$id'");
						$jguru = mysql_num_rows($guru);
						if($jguru == 1){
							$a = mysql_fetch_array($guru);?>
							<form action="users/admin/proses/edit.guru.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
								<table border="1" style="color:#000;">
									<tr class='light'>
										<th colspan='2'><center><h1>Data Guru</h1></center></th>
									</tr>
									<tr class='dark'>
										<td>Id Guru</td>
										<td><input type="hidden" name="id_guru" value="<?php echo $a['id_guru']?>"/><?php echo $a['id_guru'];?></td>
									</tr>
									<tr class='light'>
										<td>Nama Guru</td>
										<td><input class='input' type="text" name="nama" value="<?php echo $a['nm_guru']?>"/></td>
									</tr>
									<tr class='dark'>
										<td>Alamat Guru</td>
										<td><input class='input' type="text" name="alamat" value="<?php echo $a['alamat']?>"/></td>
									</tr>
									<tr class='light'>
										<td>Jenis Kelamin</td>
										<td><select style="padding:4px;solid #000;width:142px;" name="jk"value="<?php echo $a['jk']?>">
										<option value="L">Laki-laki</option>
										<option value="P">Perempuan</option>
										</select></td>
									</tr>
									<tr class='dark'>
										<td></td>
										<td><input type="submit" value="Edit" /></td>
									</tr>
								</table>
							</form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='guru';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['id_guru'])){
						echo "<script>document.location='guru';</script>";
					}else{
						$id= addslashes($_GET['id']);
						$guru = mysql_query("SELECT * FROM guru WHERE id_guru='$id'");
						$jguru = mysql_num_rows($guru);
						if($jguru == 1){
							$delete = mysql_query("DELETE FROM guru WHERE id_guru='$id'");
							if($delete){
								echo "<script>alert('Data berhasil dihapus');document.location='guru';</script>";
							}else{
								echo "<script>alert('Data gagal dihapus');document.location='guru';</script>";
							}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='guru';</script>";
						}
					}
				}
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'guru')){
				echo "
					<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th width=\"25%\" style=\"border:1px solid #000;\">
							ID guru
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							Nama guru
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							Alamat
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							Jenis Kelamin
						</th>
					</tr>";
						if(!isset($_GET['order'])){
							$guru = mysql_query("SELECT * FROM guru ");
						}else{
							$order = addslashes($_GET['order']);
							$sort = addslashes($_GET['sort']);
							$guru = mysql_query("SELECT * FROM guru ORDER BY $order $sort");
						}
						$mulai=1;
						while($a = mysql_fetch_array($guru)){
							if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"border:1px solid #000;\">$a[id_guru]</td>
							<td style=\"border:1px solid #000;\">$a[nm_guru]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[alamat]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[jk]</td></tr>";
							$mulai++;
						}
					echo "</table>";
			}
			?>
      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
  </div>
  <div class="cleaner"></div>
	
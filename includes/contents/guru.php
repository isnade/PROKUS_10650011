<div id="content">
    <div class="content_box">
		<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				echo "Maaf, Anda tidak berhak untuk melihat menu ini.";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
				if(!isset($_GET['proses'])){
					echo "<h3><center>Data Guru</center></h3>";
					echo "<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th style=\"solid #000;\">Id guru (NIP)</th>
						<th style=\"solid #000;\">Kode guru</th>
						<th style=\"solid #000;\">Nama guru</th>
						<th style=\"solid #000;\">Alamat</th>
						<th style=\"solid #000;\">Jenis Kelamin</th>
						<th style=\"solid #000;\">Agama</th>
						<th style=\"solid #000;\">Tempat Lahir</th>
						<th style=\"solid #000;\">Tanggal Lahir</th>
						<th style=\"solid #000;\">Status</th>
						<th style=\"solid #000;\">Keterangan</th>
						<th style=\"solid #000;\">Proses</th></tr>";
						$guru = mysql_query("SELECT * FROM guru ");
						$start=1;
						while($a = mysql_fetch_array($guru)){
							if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"text-align:center;solid #000;\">$a[id_guru]</td>
							<td style=\"text-align:center;solid #000;\">$a[kd_guru]</td>
							<td style=\"text-align:center;solid #000;\">$a[nm_guru]</td>
							<td style=\"text-align:center;solid #000;\">$a[alamat]</td>
							<td style=\"text-align:center;solid #000;\">$a[jk]</td>
							<td style=\"text-align:center;solid #000;\">$a[agama]</td>
							<td style=\"text-align:center;solid #000;\">$a[tempat_lahir]</td>
							<td style=\"text-align:center;solid #000;\">$a[tgl_lahir]</td>
							<td style=\"text-align:center;solid #000;\">$a[status]</td>
							<td style=\"text-align:center;solid #000;\">$a[keterangan]</td>
							<td style=\"text-align:center;solid #000;\">
							<a href=\"guru-$a[id_guru]-edit\"><img src=\"images/edit.png\"/></a> | <a href=\"guru-$a[id_guru]-hapus\"><img src=\"images/hapus.png\"/></a>
							</td></tr>";
							$start++;
						}
					echo "</table>";
					?>
					<br>
					<form action="users/admin/proses/tambah.guru.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table style="color:#000;">
							<tr><th colspan='2'><center><h3>Masukan Data guru Baru</h3></center></th></tr>
							<tr class='dark'><td>Id guru (NIP)</td>
							<td><input class="input" type="text" name="id_guru" /></td></tr>
							<tr class='light'><td>Kode Guru</td>
							<td><input class="input" type="text" name="kd_guru"/></td></tr>
							<tr class='light'><td>Nama guru</td>
							<td><input class="input" type="text" name="nama"/></td></tr>
							<tr class='dark'><td>Alamat guru</td>
							<td><input class="input" type="text" name="alamat"/></td></tr>
							<tr class='light'><td>Jenis Kelamin</td>
							<td><select style="padding:4px;solid #000;width:142px;" name="jk">
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
							</select></td></tr>
							<tr class='dark'><td>Agama</td>
							<td><input class="input" type="text" name="agama" /></td></tr>
							<tr class='light'><td>Tempat Lahir</b></td>
							<td><input type="text" name="tempat"></td></tr>
							<tr class='dark'><td>Tanggal</td>
							<td><select name="tanggal">
							<option value = "0" selected>Tanggal
							<?php
							for($i = 1; $i < 32; $i++)
							echo "<option value=$i>$i";
							?>
							</option>
							</select>
							<select name="bulan">
							<option value = "0" selected>Bulan
							<?php
							$i = '1';
							while ($i <= '12'){
							echo "<option value = $i>$i";
							$i++;
							}?>
							</option></select>
							<select name="tahun">
							<option value = "0" selected>Tahun
							<?php
							for($i = 1950; $i < 2012; $i++)
							echo "<option value=$i>$i";
							?>
							</option></select>
							</td></tr>
							<tr class='light'><td>Status</td>
							<td><input class="input" type="text" name="status"/></td></tr>
							<tr class='dark'><td>Keterangan</td>
							<td><input class="input" type="text" name="ket"/></td></tr>
							<tr><td colspan="2" align="right">
							<input type="submit" name="submit" value="Tambah"/></td>
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
							<table style="color:#000;">
							<tr class='light'>
							<th colspan='2'><center><h3>Data guru</h3></center></th></tr>
							<tr class='dark'><td>Id Guru (NIP)</td>
							<td><input type="hidden" name="id_guru" value="<?php echo $a['id_guru']?>"/><?php echo $a['id_guru'];?></td>
							</tr>
							<tr class='light'><td>Kode Guru</td>
							<td><input class='input' type="text" name="kd_guru" value="<?php echo $a['kd_guru']?>"/></td>
							</tr>
							<tr class='light'><td>Nama guru</td>
							<td><input class='input' type="text" name="nama" value="<?php echo $a['nm_guru']?>"/></td>
							</tr>
							<tr class='light'><td>Password</td>
							<td><input class='input' type="password" name="pass" value="<?php echo $a['password']?>"/></td>
							</tr>
							<tr class='dark'><td>Alamat guru</td>
							<td><input class='input' type="text" name="alamat" value="<?php echo $a['alamat']?>"/></td>
							</tr>
							<tr class='light'><td>Jenis Kelamin</td>
							<td><select style="padding:4px;solid #000;width:142px;" name="jk"value="<?php echo $a['jk']?>">
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
							</select></td>
							<tr class='dark'>
							<td>Agama</td>
							<td><input class="input" type="text" name="agama" value="<?php echo $a['agama']?>"/></td>
							</tr>
							<tr class='light'><td>Tempat Lahir</b></td>
							<td><input type="text" name="tempat" value="<?php echo $a['tempat_lahir']?>"></td>
							</tr>
							<tr class='dark'><td>Tanggal</td>
							<td><select name="tanggal">
							<option value = "0" selected>Tanggal
							<?php
							for($i = 1; $i < 32; $i++)
							echo "<option value=$i>$i";
							?>
							</option>
							</select>
							<select name="bulan">
							<option value = "0" selected>Bulan
							<?php
							$i = '1';
							while ($i <= '12'){
							echo "<option value = $i>$i";
							$i++;
							}?>
							</option></select>
							<select name="tahun">
							<option value = "0" selected>Tahun
							<?php
							for($i = 1950; $i < 2012; $i++)
							echo "<option value=$i>$i";
							?>
							</option></select>
							</td></tr>
							<tr class='light'>
								<td>Status</td>
								<td><input class="input" type="text" name="status" value="<?php echo $a['status']?>"/></td>
							</tr>
							<tr class='dark'>
								<td>Keterangan</td>
								<td><input class="input" type="text" name="ket" value="<?php echo $a['keterangan']?>"/></td>
							</tr>
							<tr class='light'>
								<td></td>
								<td><input type="submit" value="Edit" /></td></tr>
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
						$id= addslashes($_GET['id_guru']);
						
							$delete = mysql_query("DELETE FROM guru WHERE id_guru='$id'");
							if($delete){
								echo "<script>alert('Data berhasil dihapus');document.location='guru';</script>";
							}else{
								echo "<script>alert('Data gagal dihapus');document.location='guru';</script>";
							}
					}
				}
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'guru')){
				echo "
					<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th style=\"solid #000;\">Id guru (NIP)</th>
						<th style=\"solid #000;\">Kode Guru</th>
						<th style=\"solid #000;\">Nama guru</th>
						<th style=\"solid #000;\">Alamat</th>
						<th style=\"solid #000;\">Jenis Kelamin</th>
						<th style=\"solid #000;\">Agama</th>
						<th style=\"solid #000;\">Tempat Lahir</th>
						<th style=\"solid #000;\">Tanggal Lahir</th>
						<th style=\"solid #000;\">Status</th>
						<th style=\"solid #000;\">Keterangan</th></tr>";
						$guru = mysql_query("SELECT * FROM guru ");
						$start=1;
						while($a = mysql_fetch_array($guru)){
							if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"text-align:center;solid #000;\">$a[id_guru]</td>
							<td style=\"text-align:center;solid #000;\">$a[kd_guru]</td>
							<td style=\"text-align:center;solid #000;\">$a[nm_guru]</td>
							<td style=\"text-align:center;solid #000;\">$a[alamat]</td>
							<td style=\"text-align:center;solid #000;\">$a[jk]</td>
							<td style=\"text-align:center;solid #000;\">$a[agama]</td>
							<td style=\"text-align:center;solid #000;\">$a[tempat_lahir]</td>
							<td style=\"text-align:center;solid #000;\">$a[tgl_lahir]</td>
							<td style=\"text-align:center;solid #000;\">$a[status]</td>
							<td style=\"text-align:center;solid #000;\">$a[keterangan]</td></tr>";
							$start++;
						}
					echo "</table>";
			}?>
      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
  </div>
  <div class="cleaner"></div>
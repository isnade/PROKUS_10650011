<div id="content">
    <div class="content_box">
	<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				echo "Maaf, anda tidak punya izin untuk melihat menu ini.";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND !($_SESSION['sebagai'] == 'siswa')){
				if(!isset($_GET['proses'])){
				$kelas = mysql_query("SELECT kd_kelas FROM kelas");
				$i=1;
					echo "<form method='post'>
					<table border=\"1\" style=\"color:#000;\">
					<tr><td>Kelas</td><td><select name='x'>
						<option value=1 selected>";
						while ($z = mysql_fetch_array($kelas)){
							echo"<option value=$z[kd_kelas]>$z[kd_kelas]</option>";
							$i++;
							$kode = $_POST['x'];}
							echo"</option></select></td><td><input type=\"submit\" name=\"submit\" value=\"Submit\"></td></tr>
					<tr style=\"background:#ccc;\">
					<th style=\"border:1px solid #000;\">Id Siswa (NIS)</th>
					<th style=\"border:1px solid #000;\">Kode Kelas</th>
					<th style=\"border:1px solid #000;\">Bulan</th>
					<th style=\"border:1px solid #000;\">Hadir</th>
					<th style=\"border:1px solid #000;\">Jumlah Sakit</th>
					<th style=\"border:1px solid #000;\">Jumlah Izin</th>
					<th style=\"border:1px solid #000;\">Jumlah Alfa</th>
					<th style=\"border:1px solid #000;\">Tahun Ajaran</th>
					<th tyle=\"border:1px solid #000;\">Proses</th>
					</tr>";
					if($kode == 0){
					}else{
						$absensi = mysql_query("SELECT * FROM absensi where kd_kelas=$kode");
						$start=1;
						while($a = mysql_fetch_array($absensi)){
							if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"text-align:center;border:1px solid #000;\">$a[id_siswa]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[kd_kelas]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[bln]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[hadir]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[jml_sakit]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[jml_izin]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[jml_alpa]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[thn_ajaran]</td>
							<td style=\"text-align:center;border:1px solid #000;\">
							<a href=\"presensi-$a[id_siswa]-edit\"><img src=\"images/edit.png\"/></a> | <a href=\"presensi-$a[id_siswa]-hapus\"><img src=\"images/hapus.png\"/></a>
							</td></tr>";
							$start++;
						}
					echo "</table></form>";
					}
					?>
					<br>
					<form action="users/admin/proses/tambah.presensi.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table border="1" style="color:#000;">
							<tr class='light'>
								<th colspan='2'><center><h3>Masukan Data Presensi baru</h3></center></th>
							</tr>
							<tr class='dark'>
								<td>Id Siswa(NIS)</td>
								<td><input class="input" type="text" name="id" /></td>
							</tr>
							<tr class='light'>
								<td>Kode Kelas</td>
								<td><input class="input" type="text" name="kd_kelas"/></td>
							</tr>
							<tr class='dark'><td>Bulan</td>
							<td>
							<select name="bulan">
							<option value="0" selected>Bulan</option>
							<option value="Januari">Januari</option>
							<option value="Februari">Februari</option>
							<option value="Maret">Maret</option>
							<option value="April">April</option>
							<option value="Mei">Mei</option>
							<option value="Juni">Juni</option>
							<option value="Juli">Juli</option>
							<option value="Agustus">Agustus</option>
							<option value="September">September</option>
							<option value="Oktober">Oktober</option>
							<option value="November">November</option>
							<option value="Desember">Desember</option>
							</select>
							</td></tr>
							<tr class='light'>
								<td>Hadir</td>
								<td><input class="input" type="text" name="hadir"/></td>
							</tr>
							<tr class='dark'>
								<td>Jumlah Sakit</td>
								<td><input class="input" type="text" name="jml_sakit"/></td>
							</tr>
							<tr class='light'>
								<td>Jumlah Izin</td>
								<td><input class="input" type="text" name="jml_izin"/></td>
							</tr>
							<tr class='dark'>
								<td>jumlah Alpa</td>
								<td><input class="input" type="text" name="jml_alpa"/></td>
							</tr>
							<tr class='light'>
								<td>Tahun Ajaran</td>
								<td><input class="input" type="text" name="thn_ajaran"/></td>
							</tr>
							<tr class='dark'>
								<td colspan="2"><input type="submit" name="submit" align="center" value="Tambah"/></td>
							</tr>
						</table>
					</form>
					<?php
				}else if($_GET['proses']=='edit'){
					if(!isset($_GET['id_siswa'])){
						echo "<script>document.location='presensi';</script>";
					}else{
						$id= addslashes($_GET['id_siswa']);
						$absensi = mysql_query("SELECT * FROM absensi WHERE id_siswa='$id'");
						$jabsensi = mysql_num_rows($absensi);
						if($jabsensi == 1){
							$a = mysql_fetch_array($absensi);?>
							<form action="users/admin/proses/edit.presensi.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
							<table border="1" style="color:#000;">
							<tr class='light'>
							<th colspan='2'><center><h1>Data Presensi</h1></center></th></tr>
							<tr class='dark'>
								<td>Id Siswa(NIS)</td>
								<td><input class="input" type="text" name="id" value="<?php echo $a['id_siswa']?>"/></td>
							</tr>
							<tr class='light'>
								<td>Kode Kelas</td>
								<td><input class="input" type="text" name="kd_kelas" value="<?php echo $a['kd_kelas']?>"/></td>
							</tr>
							<tr class='dark'><td>Bulan</td>
							<td>
							<select name="bulan">
							<option value="<?php echo $a['bln']?>" selected><?php echo $a['bln']?></option>
							<option value="Januari">Januari</option>
							<option value="Februari">Februari</option>
							<option value="Maret">Maret</option>
							<option value="April">April</option>
							<option value="Mei">Mei</option>
							<option value="Juni">Juni</option>
							<option value="Juli">Juli</option>
							<option value="Agustus">Agustus</option>
							<option value="September">September</option>
							<option value="Oktober">Oktober</option>
							<option value="November">November</option>
							<option value="Desember">Desember</option>
							</select>
							</td></tr>
							<tr class='light'>
								<td>Hadir</td>
								<td><input class="input" type="text" name="hadir" value="<?php echo $a['hadir']?>"/></td>
							</tr>
							<tr class='dark'>
								<td>Jumlah Sakit</td>
								<td><input class="input" type="text" name="jml_sakit" value="<?php echo $a['jml_sakit']?>"/></td>
							</tr>
							<tr class='light'>
								<td>Jumlah Izin</td>
								<td><input class="input" type="text" name="jml_izin" value="<?php echo $a['jml_izin']?>"/></td>
							</tr>
							<tr class='dark'>
								<td>jumlah Alpa</td>
								<td><input class="input" type="text" name="jml_alpa" value="<?php echo $a['jml_alpa']?>"/></td>
							</tr>
							<tr class='light'>
								<td>Tahun Ajaran</td>
								<td><input class="input" type="text" name="thn_ajaran" value="<?php echo $a['thn_ajaran']?>"/></td>
							</tr>
							<tr class='light'>
							<td><input type="submit" value="Edit" /></td>
							</tr>
							</table>
							</form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='presensi';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['id_siswa'])){
						echo "<script>document.location='presensi';</script>";
					}else{
						$id= addslashes($_GET['id_siswa']);
						$absensi = mysql_query("SELECT * FROM absensi WHERE id_siswa='$id'");
						$jsiswa = mysql_num_rows($absensi);
						if($jsiswa == 1){
							$delete = mysql_query("DELETE FROM absensi WHERE id_siswa='$id'");
							if($delete){
								echo "<script>alert('Data berhasil dihapus');document.location='presensi';</script>";
							}else{
								echo "<script>alert('Data gagal dihapus');document.location='presensi';</script>";
							}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='presensi';</script>";
						}
					}
				}
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'siswa')){
			$absensi = mysql_query("SELECT s.nm_siswa,s.id_siswa,k.kelas,a.thn_ajaran FROM siswa s,kelas k,absensi a WHERE k.id_siswa='$_SESSION[nama]' and password='$_SESSION[pass]'");
			$n = mysql_fetch_array($absensi);
			echo "<table><tr><td>Nama :</td><td >$n[nm_siswa]</td></tr>
			<tr><td>NIS :</td><td>$n[id_siswa]</td></tr>
			<tr><td>Kelas :</td><td>$n[kelas]</td></tr>
			</tr></table>";
					echo "<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th style=\"border:1px solid #000;\">Bulan</th>
						<th style=\"border:1px solid #000;\">Hadir</th>
						<th style=\"border:1px solid #000;\">Jumlah Sakit</th>
						<th style=\"border:1px solid #000;\">Jumlah Izin</th>
						<th style=\"border:1px solid #000;\">Jumlah Alfa</th>
						<th style=\"border:1px solid #000;\">Tahun Ajaran</th>
					</tr>";
						$absensi = mysql_query("SELECT * FROM absensi WHERE id_siswa='$_SESSION[nama]'");
						$start=1;
						while($a = mysql_fetch_array($absensi)){
							if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"text-align:center;border:1px solid #000;\">$a[bln]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[hadir]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[jml_sakit]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[jml_izin]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[jml_alpa]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[thn_ajaran]</td></tr>";
							$start++;
						}
					echo "</table>";
			}?>
      <div class="section_w250 float_r"></div>
    </div>
    <div class="content_box_bottom"></div>
  </div>
  <div class="cleaner"></div>
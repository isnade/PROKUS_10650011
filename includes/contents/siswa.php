<div id="content">
    <div class="content_box">
		<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				echo "Maaf, Anda tidak berhak untuk melihat menu ini.";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
				if(!isset($_GET['proses'])){
				echo "<h3><center>Data Siswa</center></h3>";
					echo "<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th style=\"solid #000;\">Id Siswa (NIS)</th>
						<th style=\"solid #000;\">NISN</th>
						<th style=\"solid #000;\">Nama Siswa</th>
						<th style=\"solid #000;\">Alamat</th>
						<th style=\"solid #000;\">Jenis Kelamin</th>
						<th style=\"solid #000;\" width=\"20%\">Proses</th>
					</tr>";
							$siswa = mysql_query("SELECT * FROM siswa");
						$start=1;
						while($a = mysql_fetch_array($siswa)){
							if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"text-align:center;solid #000;\">$a[id_siswa]</td>
							<td style=\"text-align:center;solid #000;\">$a[nisn]</td>
							<td style=\"text-align:center;solid #000;\">$a[nm_siswa]</td>
							<td style=\"text-align:center;solid #000;\">$a[alamat]</td>
							<td style=\"text-align:center;solid #000;\">$a[jk]</td>
							<td style=\"text-align:center;solid #000;\"><a href=\"siswa-$a[id_siswa]-view\"><img src=\"images/view.png\"/></a>|
							<a href=\"siswa-$a[id_siswa]-edit\"><img src=\"images/edit.png\"/></a>|<a href=\"siswa-$a[id_siswa]-hapus\"><img src=\"images/hapus.png\"/></a>
							</td></tr>";
							$start++;
						}
					echo "</table>";
					?>
					<br>
					<form enctype="multipart/form-data" action="users/admin/proses/tambah.siswa.php" method="post">
						<table style="color:#000;">
							<tr><th colspan='2'><center><h3>Masukan Data Siswa Baru</h3></center></th>
							</tr>
							<tr class='light'><td>Id siswa (NIS)</td>
								<td><input class="input" type="text" name="id_siswa" /></td>
							</tr>
							<tr class='dark'><td>NISN</td>
								<td><input class="input" type="text" name="nisn" /></td>
							</tr>
							<tr class='light'><td>Nama Siswa</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'><td>Alamat Siswa</td>
								<td><input class="input" type="text" name="alamat"/></td>
							</tr>
							<tr class='light'>
								<td>Jenis Kelamin</td>
								<td><select name="jk">
								<option value="L">Laki-laki</option>
								<option value="P">Perempuan</option>
								</select></td>
							</tr>
							<tr class='dark'><td>Tempat Lahir</b></td>
							<td><input class="input" type="text" name="tempat"></td>
							</tr>
							<tr class='light'><td>Tanggal</td>
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
							}
							?>
							</option></select>
							<select name="tahun">
							<option value = "0" selected>Tahun
							<?php
							for($i = 1988; $i < 2012; $i++)
							echo "<option value=$i>$i";
							?>
							</option></select>
							</td></tr>
							<tr class='dark'><td>Agama</td>
								<td><input class="input" type="text" name="agama" /></td></tr>
							<tr class='light'><td>Angkatan</td>
								<td><input class="input" type="text" name="angkatan"/></td></tr>
							<tr class='dark'><td>Nama Ayah</td>
								<td><input class="input" type="text" name="nm_ayah" /></td></tr>
							<tr class='light'><td>Nama Ibu</td>
								<td><input class="input" type="text" name="nm_ibu"/></td></tr>
							<tr class='dark'><td>Nama Wali</td>
								<td><input class="input" type="text" name="nm_wali" /></td></tr>
							<tr class='light'><td>Pekerjaan Ayah</td>
								<td><input class="input" type="text" name="pekerjaan_ayah"/></td></tr>
							<tr class='dark'><td>Pekerjaan Ibu</td>
								<td><input class="input" type="text" name="pekerjaan_ibu" /></td></tr>
							<tr class='light'><td>Pekerjaan Wali</td>
								<td><input class="input" type="text" name="pekerjaan_wali"/></td></tr>
							<tr class='dark'><td>Penghasilan Ayah</td>
								<td><input class="input" type="text" name="penghasilan_ayah"/></td></tr>
							<tr class='light'><td>Penghasilan Ibu</td>
								<td><input class="input" type="text" name="penghasilan_ibu" /></td></tr>
							<tr class='dark'><td>Penghasilan Wali</td>
								<td><input class="input" type="text" name="penghasilan_wali"/></td></tr>
							<tr class='light'><td>Diterima di Tingkat</td>
								<td><input class="input" type="text" name="diterima_ditingkat"/></td></tr>
							<tr class='dark'><td>Diterima Tanggal</td>
								<td><input class="input" type="text" name="diterima_tanggal"/></td></tr>
							<tr class='light'><td>Nomor STTB</td>
								<td><input class="input" type="text" name="no_sttb" /></td></tr>
							<tr class='dark'><td>Tahun STTB</td>
								<td><input class="input" type="text" name="tahun_sttb"/></td></tr>
							<tr class='light'><td>Anak ke</td>
								<td><input class="input" type="text" name="anak_ke" /></td><tr>
							<tr class='dark'><td>Foto</td>
								<td><input type="file" name="foto" id="foto"/></td></tr>
								<td colspan="2" align="right">
								<input type="submit" name="submit" value="Tambah" /></td></tr>
						</table>
					</form>
					<?php
				}else if($_GET['proses']=='edit'){
					if(!isset($_GET['id_siswa'])){
						echo "<script>document.location='siswa';</script>";
					}else{
						$id= addslashes($_GET['id_siswa']);
						$siswa = mysql_query("SELECT * FROM siswa WHERE id_siswa='$id'");
						$jsiswa = mysql_num_rows($siswa);
						if($jsiswa == 1){
							$a = mysql_fetch_array($siswa);?>
							<form enctype="multipart/form-data" action="users/admin/proses/edit.siswa.php" method="post">
							<table style="color:#000;">
							<tr class='dark'><th colspan='2'><center><h3>Data siswa</h3></center></th></tr>
							<tr class='light'><td>Id siswa</td>
							<td><input class='input' type="text" name="id_siswa" value="<?php echo $a['id_siswa']?>"/></td>
							</tr>
							<tr class='dark'><td>NISN</td>
							<td><input class='input' type="text" name="nisn" value="<?php echo $a['nisn']?>"/></td>
							</tr>
							<tr class='dark'><td>Password</td>
							<td><input class='input' type="password" name="password" value="<?php echo $a['password']?>"/></td>
							</tr>
							<tr class='light'><td>Nama Siswa</td>
							<td><input class='input' type="text" name="nama" value="<?php echo $a['nm_siswa']?>"/></td>
							</tr>
							<tr class='dark'><td>Alamat Siswa</td>
							<td><input class='input' type="text" name="alamat" value="<?php echo $a['alamat']?>"/></td>
							</tr>
							<tr class='light'><td>Jenis Kelamin</td>
							<td><select name="jk" value="<?php echo $a['jk']?>">
							<option value="L">Laki-laki</option>
							<option value="P">Perempuan</option>
							</select></td></tr>
							<tr class='dark'><td>Tempat Lahir</b></td>
							<td><input type="text" name="tempat" value="<?php echo $a['tempat_lahir']?>"></td>
							</tr>
							<tr class='light'><td>Tanggal</td>
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
							for($i = 1988; $i < 2012; $i++)
							echo "<option value=$i>$i";
							?>
							</option></select>
							</td></tr>
							<tr class='dark'><td>Agama</td>
							<td><input class="input" type="text" name="agama" value="<?php echo $a['agama']?>"/></td>
							</tr>
							<tr class='light'><td>Angkatan</td>
							<td><input class="input" type="text" name="angkatan" value="<?php echo $a['angkatan']?>"/></td>
							</tr>
							<tr class='dark'><td>Nama Ayah</td>
							<td><input class="input" type="text" name="nm_ayah" value="<?php echo $a['nm_ayah']?>"/></td>
							</tr>
							<tr class='light'><td>Nama Ibu</td>
							<td><input class="input" type="text" name="nm_ibu" value="<?php echo $a['nm_ibu']?>"/></td>
							</tr>
							<tr class='dark'><td>Nama Wali</td>
							<td><input class="input" type="text" name="nm_wali" value="<?php echo $a['nm_wali']?>"/></td>
							</tr>
							<tr class='light'><td>Pekerjaan Ayah</td>
							<td><input class="input" type="text" name="pekerjaan_ayah" value="<?php echo $a['pekerjaan_ayah']?>"/></td>
							</tr>
							<tr class='dark'><td>Pekerjaan Ibu</td>
							<td><input class="input" type="text" name="pekerjaan_ibu" value="<?php echo $a['pekerjaan_ibu']?>"/></td>
							</tr>
							<tr class='light'><td>Pekerjaan Wali</td>
							<td><input class="input" type="text" name="pekerjaan_wali" value="<?php echo $a['pekerjaan_wali']?>"/></td>
							</tr>
							<tr class='light'><td>Penghasilan Ayah</td>
							<td><input class="input" type="text" name="penghasilan_ayah" value="<?php echo $a['penghasilan_ayah']?>"/></td>
							</tr>
							<tr class='dark'><td>Penghasilan Ibu</td>
							<td><input class="input" type="text" name="penghasilan_ibu" value="<?php echo $a['penghasilan_ibu']?>"/></td>
							</tr>
							<tr class='light'><td>Penghasilan Wali</td>
							<td><input class="input" type="text" name="penghasilan_wali" value="<?php echo $a['penghasilan_wali']?>"/></td>
							</tr>
							<tr class='dark'><td>Diterima di Tingkat</td>
							<td><input class="input" type="text" name="diterima_ditingkat" value="<?php echo $a['diterima_ditingkat']?>"/></td>
							</tr>
							<tr class='light'><td>Diterima Tanggal</td>
							<td><input class="input" type="text" name="diterima_tanggal" value="<?php echo $a['diterima_tanggal']?>"/></td>
							</tr>
							<tr class='dark'><td>Nomor STTB</td>
							<td><input class="input" type="text" name="no_sttb" value="<?php echo $a['no_sttb']?>"/></td>
							</tr>
							<tr class='light'><td>Tahun STTB</td>
							<td><input class="input" type="text" name="tahun_sttb" value="<?php echo $a['tahun_sttb']?>"/></td>
							</tr>
							<tr class='dark'><td>Anak ke</td>
							<td><input class="input" type="text" name="anak_ke" value="<?php echo $a['anak_ke']?>"/></td>
							</tr>
							<tr class='light'><td>Foto</td>
							<td><input type="file" name="foto" id="foto" value="<?php echo $a['foto']?>"/></td>
							</tr>
							<tr class='dark'><td><input type="submit" value="Edit" /></td></tr>
							</table></form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='siswa';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['id_siswa'])){
						echo "<script>document.location='siswa';</script>";
					}else{
						$id= addslashes($_GET['id_siswa']);
						$siswa = mysql_query("SELECT * FROM siswa WHERE id_siswa='$id'");
						$jsiswa = mysql_num_rows($siswa);
						if($jsiswa == 1){
							$delete = mysql_query("DELETE FROM siswa WHERE id_siswa='$id'");
							if($delete){
								echo "<script>alert('Data berhasil dihapus');document.location='siswa';</script>";
							}else{
								echo "<script>alert('Data gagal dihapus');document.location='siswa';</script>";
							}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='siswa';</script>";
						}
					}
				}else if($_GET['proses']=='view'){
					if(!isset($_GET['id_siswa'])){
						echo "<script>document.location='siswa';</script>";
					}else{
					$id= addslashes($_GET['id_siswa']);
					$siswa = mysql_query("SELECT * FROM siswa WHERE id_siswa='$id'");
					$sis = mysql_num_rows($siswa);
					if($sis == 1){
					$a = mysql_fetch_array($siswa);
					echo "<h3><center>Data Siswa</center></h3>";
					echo "<table style=\"color:#000;\">
					<tr><td><img src=\"./$a[foto]\"/></td></tr>
						<td>Id Siswa (NIS)</td><td>$a[id_siswa]</td></tr>
						<tr><td>NISN</td><td>$a[nisn]</td></tr>
						<td>Nama Siswa</td><td>$a[nm_siswa]</td></tr>
						<td>Alamat</td><td>$a[alamat]</td></tr>
						<td>Jenis Kelamin</td><td>$a[jk]</td></tr>
						<td>Tempat Lahir</td><td>$a[tempat_lahir]</td></tr>
						<td>Tanggal Lahir</td><td>$a[tgl_lahir]</td></tr>
						<td>Agama</td><td>$a[agama]</td></tr>
						<td>Angkatan</td><td>$a[angkatan]</td></tr>
						<td>Nama Ayah</td><td>$a[nm_ayah]</td></tr>
						<td>Nama Ibu</td><td>$a[nm_ibu]</td></tr>
						<td>Nama Wali</td><td>$a[nm_wali]</td></tr>
						<td>Pekerjaan Ayah</td><td>$a[pekerjaan_ayah]</td></tr>
						<td>Pekerjaan Ibu</td><td>$a[pekerjaan_ibu]</td></tr>
						<td>Pekerjaan Wali</td><td>$a[pekerjaan_wali]</td></tr>
						<td>Penghasilan Ayah</td><td>$a[penghasilan_ayah]</td></tr>
						<td>Penghasilan Ibu</td><td>$a[penghasilan_ibu]</td></tr>
						<td>Penghasilan Wali</td><td>$a[penghasilan_wali]</td></tr>
						<td>Diterima di tingkat</td><td>$a[diterima_ditingkat]</td></tr>
						<td>Diterima Tanggal</td><td>$a[diterima_tanggal]</td></tr>
						<td>No STTB</td><td>$a[no_sttb]</td></tr>
						<td>Tahun STTB</td><td>$a[tahun_sttb]</td></tr>
						<td>Anak ke</td><td>$a[anak_ke]</td></tr>
						<td>Proses</td><td><a href=\"siswa-$a[id_siswa]-edit\"><img src=\"images/edit.png\"/></a>|<a href=\"siswa-$a[id_siswa]-hapus\"><img src=\"images/hapus.png\"/></a>|
						<a href=\"javascript:window.print()\"><img src=\"images/print.png\"/></a></td>
					</tr>";
					}
					echo "</table>";
				}
			}
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'guru')){
			if(!isset($_GET['proses'])){
				echo "<table style=\"color:#000;\"><tr><td colspan=8 align=center><h3>Data Siswa</h3></td></tr>
					<tr style=\"background:#ccc;\">
						<th style=\"solid #000;\">Id Siswa (NIS)</th>
						<th style=\"solid #000;\">NISN</th>
						<th style=\"solid #000;\">Nama Siswa</th>
						<th style=\"solid #000;\">Alamat</th>
						<th style=\"solid #000;\">Jenis Kelamin</th>
						<th style=\"solid #000;\">Agama</th>
						<th style=\"solid #000;\">Angkatan</th>
						<th style=\"solid #000;\"></th>
					</tr>";
						$siswa = mysql_query("SELECT * FROM siswa ");
						$start=1;
						while($a = mysql_fetch_array($siswa)){
							if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"text-align:center;solid #000;\">$a[id_siswa]</td>
							<td style=\"text-align:center;solid #000;\">$a[nisn]</td>
							<td style=\"text-align:center;solid #000;\">$a[nm_siswa]</td>
							<td style=\"text-align:center;solid #000;\">$a[alamat]</td>
							<td style=\"text-align:center;solid #000;\">$a[jk]</td>
							<td style=\"text-align:center;solid #000;\">$a[agama]</td>
							<td style=\"text-align:center;solid #000;\">$a[angkatan]</td>
							<td><a href=\"siswa-$a[id_siswa]-view\">Lihat Selengkapnya</a></td>
							</tr>";
							$start++;
						}
					echo "</table>";
			}else if($_GET['proses']=='view'){
					if(!isset($_GET['id_siswa'])){
						echo "<script>document.location='siswa';</script>";
					}else{
					$id= addslashes($_GET['id_siswa']);
					$siswa = mysql_query("SELECT * FROM siswa WHERE id_siswa='$id'");
					$sis = mysql_num_rows($siswa);
					if($sis == 1){
					$a = mysql_fetch_array($siswa);
					echo "<h3><center>Data Siswa</center></h3>";
					echo "<table style=\"color:#000;\">
					<tr><td><img src=\"./$a[foto]\"/></td></tr>
						<td>Id Siswa (NIS)</td><td>$a[id_siswa]</td></tr>
						<tr><td>NISN</td><td>$a[nisn]</td></tr>
						<td>Nama Siswa</td><td>$a[nm_siswa]</td></tr>
						<td>Alamat</td><td>$a[alamat]</td></tr>
						<td>Jenis Kelamin</td><td>$a[jk]</td></tr>
						<td>Tempat Lahir</td><td>$a[tempat_lahir]</td></tr>
						<td>Tanggal Lahir</td><td>$a[tgl_lahir]</td></tr>
						<td>Agama</td><td>$a[agama]</td></tr>
						<td>Angkatan</td><td>$a[angkatan]</td></tr>
						<td>Nama Ayah</td><td>$a[nm_ayah]</td></tr>
						<td>Nama Ibu</td><td>$a[nm_ibu]</td></tr>
						<td>Nama Wali</td><td>$a[nm_wali]</td></tr>
						<td>Pekerjaan Ayah</td><td>$a[pekerjaan_ayah]</td></tr>
						<td>Pekerjaan Ibu</td><td>$a[pekerjaan_ibu]</td></tr>
						<td>Pekerjaan Wali</td><td>$a[pekerjaan_wali]</td></tr>
						<td>Penghasilan Ayah</td><td>$a[penghasilan_ayah]</td></tr>
						<td>Penghasilan Ibu</td><td>$a[penghasilan_ibu]</td></tr>
						<td>Penghasilan Wali</td><td>$a[penghasilan_wali]</td></tr>
						<td>Diterima di tingkat</td><td>$a[diterima_ditingkat]</td></tr>
						<td>Diterima Tanggal</td><td>$a[diterima_tanggal]</td></tr>
						<td>No STTB</td><td>$a[no_sttb]</td></tr>
						<td>Tahun STTB</td><td>$a[tahun_sttb]</td></tr>
						<td>Anak ke</td><td>$a[anak_ke]</td></tr>
						<td>Proses</td><td><a href=\"javascript:window.print()\"><img src=\"images/print.png\"/></a></td>
					</tr>";
					}
					echo "</table>";
				}
			}
			}?>
      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
  </div>
  <div class="cleaner"></div>
	
<div id="content">
    <div class="content_box">
		<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				echo "Maaf, Anda tidak berhak untuk melihat menu ini.";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
				if(!isset($_GET['proses'])){
					echo "<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th style=\"border:1px solid #000;\">
							Id Siswa (NIS)
						</th>
						<th style=\"border:1px solid #000;\">
							Nama Siswa							
						</th>
						<th style=\"border:1px solid #000;\">
							Alamat
						</th>
						<th style=\"border:1px solid #000;\">
							Jenis Kelamin
						</th>
						<th style=\"border:1px solid #000;\">
							Agama
						</th>
						<th style=\"border:1px solid #000;\">
							Angkatan
						</th>
						<th style=\"border:1px solid #000;\">
							Nama Ayah 
						</th>
						<th style=\"border:1px solid #000;\">
							Nama Ibu
						</th>
						<th style=\"border:1px solid #000;\">
							Nama Wali
						</th>
						<th style=\"border:1px solid #000;\">
							Pekerjaan Ayah
						</th>
						<th style=\"border:1px solid #000;\">
							Pekerjaan Ibu
						</th>
						<th style=\"border:1px solid #000;\">
							Pekerjaan Wali
						</th>
						<th style=\"border:1px solid #000;\">
							Diterima di tingkat
						</th>
						<th style=\"border:1px solid #000;\">
							Diterima Tanggal
						</th>
						<th style=\"border:1px solid #000;\">
							No STTB
						</th>
						<th style=\"border:1px solid #000;\">
							Tahun STTB
						</th>
						<th style=\"border:1px solid #000;\">
							Anak ke
						</th>
						<th style=\"border:1px solid #000;\">Proses</th>
					</tr>";
						if(!isset($_GET['order'])){
							$siswa = mysql_query("SELECT * FROM siswa ");
						}else{
							$order = addslashes($_GET['order']);
							$sort = addslashes($_GET['sort']);
							$siswa = mysql_query("SELECT * FROM siswa ORDER BY $order $sort");
						}
						$mulai=1;
						while($a = mysql_fetch_array($siswa)){
							if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"border:1px solid #000;\">$a[id_siswa]</td>
							<td style=\"border:1px solid #000;\">$a[nm_siswa]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[alamat]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[jk]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[agama]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[angkatan]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[nm_ayah]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[nm_ibu]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[nm_wali]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[pekerjaan_ayah]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[pekerjaan_ibu]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[pekerjaan_wali]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[diterima_ditingkat]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[diterima_tanggal]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[no_sttb]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[tahun_sttb]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[anak_ke]</td>
							<td style=\"text-align:center;border:1px solid #000;\">
							<a href=\"siswa-$a[id_siswa]-edit\">Edit</a> | <a href=\"siswa-$a[id_siswa]-hapus\">Hapus</a>
							</td></tr>";
							$mulai++;
						}
					echo "</table>";
					?>
					<form action="users/admin/proses/tambah.siswa.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table border="0" style="color:#000;">
							<tr class='light'>
								<th colspan='2'><center><h3>Masukan Data Siswa Baru</h3></center></th>
							</tr>
							<tr class='dark'>
								<td>Id siswa (NIS)</td>
								<td><input class="input" type="text" name="id_siswa" /></td>
							</tr>
							<tr class='light'>
								<td>Nama Siswa</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'>
								<td>Alamat Siswa</td>
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
								<td>Agama</td>
								<td><input class="input" type="text" name="id_siswa" /></td>
							</tr>
							<tr class='light'>
								<td>Angkatan</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'>
								<td>Nama Ayah</td>
								<td><input class="input" type="text" name="id_siswa" /></td>
							</tr>
							<tr class='light'>
								<td>Nama Ibu</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'>
								<td>Nama Wali</td>
								<td><input class="input" type="text" name="id_siswa" /></td>
							</tr>
							<tr class='light'>
								<td>Pekerjaan Ayah</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'>
								<td>Pekerjaan Ibu</td>
								<td><input class="input" type="text" name="id_siswa" /></td>
							</tr>
							<tr class='light'>
								<td>Pekerjaan Wali</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'>
								<td>Diterima di Tingkat</td>
								<td><input class="input" type="text" name="id_siswa" /></td>
							</tr>
							<tr class='light'>
								<td>Diterima Tanggal</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'>
								<td>Nomor STTB</td>
								<td><input class="input" type="text" name="id_siswa" /></td>
							</tr>
							<tr class='light'>
								<td>Tahun STTB</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<tr class='dark'>
								<td>Anak ke</td>
								<td><input class="input" type="text" name="id_siswa" /></td>
							<tr class='light'>
								<td></td>
								<td><input type="submit" name="submit" value="Tambah" /></td>
							</tr>
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
							<form action="users/admin/proses/edit.siswa.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
								<table border="1" style="color:#000;">
									<tr class='light'>
										<th colspan='2'><center><h1>Data siswa</h1></center></th>
									</tr>
									<tr class='dark'>
										<td>Id siswa</td>
										<td><input type="hidden" name="id_siswa" value="<?php echo $a['id_siswa']?>"/><?php echo $a['id_siswa'];?></td>
									</tr>
									<tr class='light'>
										<td>Nama Siswa</td>
										<td><input class='input' type="text" name="nama" value="<?php echo $a['nm_siswa']?>"/></td>
									</tr>
									<tr class='dark'>
										<td>Alamat Siswa</td>
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
							echo "<script>alert('Data tidak ditemukan');document.location='siswa';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['id_siswa'])){
						echo "<script>document.location='siswa';</script>";
					}else{
						$id= addslashes($_GET['id']);
						$siswa = mysql_query("SELECT * FROM siswa WHERE id_guru='$id'");
						$jsiswa = mysql_num_rows($siswa);
						if($jsiswa == 1){
							$delete = mysql_query("DELETE FROM siswa WHERE id_guru='$id'");
							if($delete){
								echo "<script>alert('Data berhasil dihapus');document.location='siswa';</script>";
							}else{
								echo "<script>alert('Data gagal dihapus');document.location='siswa';</script>";
							}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='siswa';</script>";
						}
					}
				}
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'siswa')){
				echo "
					<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th width=\"25%\" style=\"border:1px solid #000;\">
							ID siswa
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							Nama Siswa
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							Alamat
						</th>
						<th width=\"25%\" style=\"border:1px solid #000;\">
							Jenis Kelamin
						</th>
					</tr>";
						if(!isset($_GET['order'])){
							$siswa = mysql_query("SELECT * FROM siswa ");
						}else{
							$order = addslashes($_GET['order']);
							$sort = addslashes($_GET['sort']);
							$siswa = mysql_query("SELECT * FROM siswa ORDER BY $order $sort");
						}
						$mulai=1;
						while($a = mysql_fetch_array($siswa)){
							if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"border:1px solid #000;\">$a[id_siswa]</td>
							<td style=\"border:1px solid #000;\">$a[nm_siswa]</td>
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
	
<div id="content">
    <div class="content_box">
	<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				echo "Maaf, anda tidak punya izin untuk melihat menu ini.";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
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
					<th style=\"border:1px solid #000;\">Kode Kelas</th>
					<th style=\"border:1px solid #000;\">Kode Mapel</th>
					<th style=\"border:1px solid #000;\">Hari</th>
					<th style=\"border:1px solid #000;\">Jam</th>
					<th style=\"border:1px solid #000;\">Kode Guru</th>
					<th style=\"border:1px solid #000;\">Ruang</th>
					<th style=\"border:1px solid #000;\">Tahun Ajaran</th>
					<th tyle=\"border:1px solid #000;\">Proses</th>
					</tr>";
					if($kode == 0){
					}else{
						$jadwal = mysql_query("SELECT * FROM jadwal where kd_kelas=$kode");
						$start=1;
						while($a = mysql_fetch_array($jadwal)){
							if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"text-align:center;border:1px solid #000;\">$a[kd_kelas]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[kd_mapel]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[hari]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[jam]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[kd_guru]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[ruang]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[thn_ajaran]</td>
							<td style=\"text-align:center;border:1px solid #000;\">
							<a href=\"jadwal-$a[kd_kelas]-edit\"><img src=\"images/edit.png\"/></a> | <a href=\"jadwal-$a[kd_kelas]-hapus\"><img src=\"images/hapus.png\"/></a>
							</td></tr>";
							$start++;
						}
					echo "</table></form>";
					}
					?>
					<br>
					<form action="users/admin/proses/tambah.jadwal.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table border="1" style="color:#000;">
							<tr class='light'>
								<th colspan='2'><center><h3>Masukan Jadwal</h3></center></th>
							</tr>
							<tr class='dark'>
								<td>Kode Kelas</td>
								<td><input class="input" type="text" name="kd_kelas" /></td>
							</tr>
							<tr class='light'>
								<td>Kode Mapel</td>
								<td><input class="input" type="text" name="kd_mapel"/></td>
							</tr>
							<tr class='dark'>
								<td>Hari</td>
								<td><input class="input" type="text" name="hari"/></td>
							</tr>
							<tr class='light'>
								<td>Jam</td>
								<td><input class="input" type="text" name="jam"/></td>
							</tr>
							<tr class='dark'>
								<td>Kode Guru</td>
								<td><input class="input" type="text" name="kd_guru"/></td>
							</tr>
							<tr class='light'>
								<td>Ruang</td>
								<td><input class="input" type="text" name="ruang"/></td>
							</tr>
							<tr class='dark'>
								<td>Tahun Ajaran</td>
								<td><input class="input" type="text" name="thn_ajaran"/></td>
							</tr>
							<tr class='light'>
								<td colspan="2"><input type="submit" name="submit" align="center" value="Tambah"/></td>
							</tr>
						</table>
					</form>
					<?php
				}else if($_GET['proses']=='edit'){
					if(!isset($_GET['kd_kelas'])){
						echo "<script>document.location='jadwal';</script>";
					}else{
						$id= addslashes($_GET['kd_kelas']);
						$jadwal = mysql_query("SELECT * FROM jadwal WHERE kd_kelas='$id'");
						$jjadwal = mysql_num_rows($jadwal);
						if($jjadwal == 1){
							$a = mysql_fetch_array($jadwal);?>
							<form action="users/admin/proses/edit.jadwal.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
							<table border="1" style="color:#000;">
							<tr class='light'>
							<th colspan='2'><center><h1>Data jadwal</h1></center></th></tr>
							<tr class='dark'><td>Kode Kelas</td>
							<td><input class="input" type="text" name="kd_kelas" value="<?php echo $a['kd_kelas']?>"/></td>
							</tr>
							<tr class='light'><td>Kode Mapel</td>
							<td><input class="input" type="text" name="kd_mapel" value="<?php echo $a['kd_mapel']?>"/></td>
							</tr>
							<tr class='dark'><td>Hari</td>
							<td><input class="input" type="text" name="hari" value="<?php echo $a['hari']?>"/></td>
							</tr>
							<tr class='light'><td>Jam</td>
							<td><input class="input" type="text" name="jam" value="<?php echo $a['jam']?>"/></td>
							</tr>
							<tr class='dark'><td>Kode Guru</td>
							<td><input class="input" type="text" name="kd_guru" value="<?php echo $a['kd_guru']?>"/></td>
							</tr>
							<tr class='light'><td>Ruang</td>
							<td><input class="input" type="text" name="ruang" value="<?php echo $a['ruang']?>"/></td>
							</tr>
							<tr class='dark'><td>Tahun Ajaran</td>
							<td><input class="input" type="text" name="thn_ajaran" value="<?php echo $a['thn_ajaran']?>"/></td>
							</tr>
							<tr class='light'>
							<td><input type="submit" value="Edit" /></td>
							</tr>
							</table>
							</form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='jadwal';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['kd_kelas'])){
						echo "<script>document.location='jadwal';</script>";
					}else{
						$id= addslashes($_GET['kd_kelas']);
						$jadwal = mysql_query("SELECT * FROM jadwal WHERE kd_kelas='$id'");
						$jsiswa = mysql_num_rows($jadwal);
						if($jsiswa == 1){
							$delete = mysql_query("DELETE FROM jadwal WHERE kd_kelas='$id'");
							if($delete){
								echo "<script>alert('Data berhasil dihapus');document.location='jadwal';</script>";
							}else{
								echo "<script>alert('Data gagal dihapus');document.location='jadwal';</script>";
							}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='jadwal';</script>";
						}
					}
				}
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'siswa')){
			$jadwal = mysql_query("SELECT s.nm_siswa,s.id_siswa,k.kelas,j.thn_ajaran FROM siswa s,kelas k,jadwal j WHERE k.id_siswa='$_SESSION[nama]' and password='$_SESSION[pass]'");
			$j = mysql_fetch_array($jadwal);
			echo "<table><tr><td>Nama :</td><td >$j[nm_siswa]</td></tr>
			<tr><td>NIS :</td><td>$j[id_siswa]</td></tr>
			<tr><td>Kelas :</td><td>$j[kelas]</td></tr>
			</table>";
			echo "<table border=\"1\" style=\"color:#000;\">
			<tr style=\"background:#ccc;\">
			<th style=\"border:1px solid #000;\">Mapel</th>
			<th style=\"border:1px solid #000;\">Hari</th>
			<th style=\"border:1px solid #000;\">Jam</th>
			<th style=\"border:1px solid #000;\">Kode Guru</th>
			<th style=\"border:1px solid #000;\">Ruang</th>
			<th style=\"border:1px solid #000;\">Tahun Ajaran</th></tr>";
			$jadwal = mysql_query("SELECT j.* FROM jadwal j,kelas k WHERE k.id_siswa='$_SESSION[nama]' and j.kd_kelas=k.kd_kelas");
			$start=1;
			while($a = mysql_fetch_array($jadwal)){
			if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
			echo "<td style=\"text-align:center;border:1px solid #000;\">$a[kd_mapel]</td>
			<td style=\"text-align:center;border:1px solid #000;\">$a[hari]</td>
			<td style=\"text-align:center;border:1px solid #000;\">$a[jam]</td>
			<td style=\"text-align:center;border:1px solid #000;\">$a[kd_guru]</td>
			<td style=\"text-align:center;border:1px solid #000;\">$a[ruang]</td>
			<td style=\"text-align:center;border:1px solid #000;\">$a[thn_ajaran]</td></tr>";
			$start++;
			}
			echo "</table>";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'guru')){
			echo "<table border=\"1\" style=\"color:#000;\"><tr><td colspan=8 align=center><h3>Jadwal</h3></td></tr>
			<tr style=\"background:#ccc;\">
			<th style=\"border:1px solid #000;\">Kelas</th>
			<th style=\"border:1px solid #000;\">Hari</th>
			<th style=\"border:1px solid #000;\">Jam</th>
			<th style=\"border:1px solid #000;\">Ruang</th>
			<th style=\"border:1px solid #000;\">Tahun Ajaran</th></tr>";
			$jadwal = mysql_query("SELECT j.*,k.kelas FROM jadwal j,kelas k WHERE j.id_guru='$_SESSION[nama]' and j.kd_kelas=k.kd_kelas");
			$start=1;
			while($a = mysql_fetch_array($jadwal)){
			if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
			echo "<td style=\"text-align:center;border:1px solid #000;\">$a[kelas]</td>
			<td style=\"text-align:center;border:1px solid #000;\">$a[hari]</td>
			<td style=\"text-align:center;border:1px solid #000;\">$a[jam]</td>
			<td style=\"text-align:center;border:1px solid #000;\">$a[ruang]</td>
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
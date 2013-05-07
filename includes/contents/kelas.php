<div id="content">
    <div class="content_box">
			<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				echo "Maaf, anda tidak punya izin untuk melihat menu ini.";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
				if(!isset($_GET['proses'])){
				$kelas = mysql_query("SELECT kd_kelas FROM kelas");
				
					echo "<form method='post'>
					<table border=\"1\" style=\"color:#000;\">
					<tr><th colspan=\"100%\"><center><h3>Kelas</h3></center></th></tr>
						<tr><td>Kelas</td><td><select name='x'>
						<option value='1' selected>";
						while ($z = mysql_fetch_array($kelas)){
							echo"<option value=$z[kd_kelas]>$z[kd_kelas]</option>";
							$kode = $_POST['x'];
							}
							echo"</option></select><input type=\"submit\" name=\"submit\" value=\"Submit\"></td></tr>
					<tr style=\"background:#ccc;\">
						<th style=\"border:1px solid #000;\">Kode kelas</th>
						<th style=\"border:1px solid #000;\">Id Siswa</th>
						<th style=\"border:1px solid #000;\">Kelas</th>
						<th style=\"border:1px solid #000;\">Tahun Ajaran</th>
						<th style=\"border:1px solid #000;\">Proses</th>
					</tr>";
					if($kode == 0){
					}else{
						$kelas = mysql_query("SELECT * FROM kelas where kd_kelas=$kode");
						$mulai=1;
							while($m = mysql_fetch_array($kelas)){
								if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
								echo "<td style=\"text-align:center;border:1px solid #000;\">$m[kd_kelas]</td>
								<td style=\"border:1px solid #000;\">$m[id_siswa]</td>
								<td style=\"text-align:center;border:1px solid #000;\">$m[kelas]</td>
								<td style=\"text-align:center;border:1px solid #000;\">$m[thn_ajaran]</td>
								<td style=\"text-align:center;border:1px solid #000;\">
							<a href=\"kelas-$m[kd_kelas]-edit\"><img src=\"images/edit.png\"/></a> | <a href=\"kelas-$m[kd_kelas]-hapus\"><img src=\"images/hapus.png\"/></a>
							</td></tr>";
								$mulai++;
							}
					echo "</table></form>";
					}
			?>
			<br>
			<form action="users/admin/proses/tambah.kelas.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table border="1" style="color:#000;">
							<tr class='light'>
								<th colspan='2'><center><h3>Masukan Data Kelas</h3></center></th>
							</tr>
							<tr class='dark'>
								<td>Kode Kelas</td>
								<td><input class="input" type="text" name="kd_kelas" /></td>
							</tr>
							<tr class='light'>
								<td>Id Siswa</td>
								<td><input class="input" type="text" name="id_siswa"/></td>
							</tr>
							<tr class='dark'>
								<td>Kelas</td>
								<td><input class="input" type="text" name="kelas"/></td>
							</tr>
							<tr class='light'>
								<td>Tahun Ajaran</td>
								<td><input class="input" type="text" name="thn_ajaran"/></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="submit" align="center" value="Tambah" /></td>
							</tr>
						</table>
					</form>
					<?php
				}else if($_GET['proses']=='edit'){
					if(!isset($_GET['kd_kelas'])){
						echo "<script>document.location='kelas';</script>";
					}else{
						$kd= addslashes($_GET['kd_kelas']);
						$kelas = mysql_query("SELECT * FROM kelas WHERE kd_kelas='$kd'");
						$jkelas = mysql_num_rows($kelas);
						if($jkelas == 1){
							$a = mysql_fetch_array($kelas);?>
							<form action="users/admin/proses/edit.kelas.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
							<table border="1" style="color:#000;">
							<tr class='light'><th colspan='2'><center><h1>Data kelas</h1></center></th></tr>
							<tr class='dark'><td>Kode kelas</td>
								<td><input class="input" type="text" name="kd_kelas" value="<?php echo $a['kd_kelas']?>"/></td>
							</tr>
							<tr class='light'><td>Mata Pelajaran</td>
								<td><input class="input" type="text" name="id_siswa" value="<?php echo $a['id_siswa']?>"/></td>
							</tr>
							<tr class='dark'><td>Kode Kelas</td>
								<td><input class="input" type="text" name="kelas" value="<?php echo $a['kelas']?>"/></td>
							</tr>
							<tr class='light'><td>Id Guru</td>
								<td><input class="input" type="text" name="thn_ajaran" value="<?php echo $a['thn_ajaran']?>"/></td>
							</tr>
							<tr class='dark'><td><input type="submit" value="Edit" /></td>
							</tr>
							</table>
							</form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='kelas';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['kd_kelas'])){
						echo "<script>document.location='kelas';</script>";
					}else{
						$kd = $_GET['kd_kelas'];
						$kelas = mysql_query("SELECT * FROM kelas WHERE kd_kelas='$kd'");
						$jkelas = mysql_num_rows($kelas);
						if($jkelas == 1){
							$delete = mysql_query("DELETE FROM kelas WHERE kd_kelas='$kd'");
							if($delete){
								echo "<script>alert('Data berhasil dihapus');document.location='kelas';</script>";
							}else{
								echo "<script>alert('Data gagal dihapus');document.location='kelas';</script>";
								}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='kelas';</script>";
						}
					}
				}
			}
			?>
	      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
  </div>
  <div class="cleaner"></div>
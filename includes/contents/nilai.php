<div id="content">
    <div class="content_box">
	<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				echo "Maaf, anda tidak punya izin untuk melihat menu ini.";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
				if(!isset($_GET['proses'])){
				$kelas = mysql_query("SELECT distinct kd_kelas FROM kelas");
				$ta = mysql_query("SELECT distinct thn_ajaran FROM kelas");
					echo "<form method='post'>
					<table border=\"1\" style=\"color:#000;\">
					<tr><td colspan=2>Kelas :</td><td><select name='x'>";
						while ($z = mysql_fetch_array($kelas)){
							echo"<option value=$z[kd_kelas]>$z[kd_kelas]</option>";
							$kode = $_POST['x'];}
							echo"</option></select></td></tr>
					<tr><td colspan=2>Tahun Ajaran :</td><td><select name='y'>";
						while ($w = mysql_fetch_array($ta)){
							echo"<option value=$w[thn_ajaran]>$w[thn_ajaran]</option>";
							$th = $_POST['y'];}
							echo"</option></select></td>";
							?>
							<td><input type="submit" name="submit" value="Lihat" /></td></tr>
							
					<tr style="background:#ccc;">
					<th style="border:1px solid #000;">Id Siswa (NIS)</th>
					<th style="border:1px solid #000;">Semester</th>
					<th style="border:1px solid #000;">Kode Mapel</th>
					<th style="border:1px solid #000;">KKM</th>
					<th style="border:1px solid #000;">Ulangan 1</th>
					<th style="border:1px solid #000;">Ulangan 2</th>
					<th style="border:1px solid #000;">Ulangan 3</th>
					<th style="border:1px solid #000;">Mid Semester</th>
					<th style="border:1px solid #000;">Ujian Akhir Semester</th>
					<th style="border:1px solid #000;">Nilai Rapor</th>
					<th style="border:1px solid #000;">Proses</th></tr>
					<?php
					if($kode!=0 ){
						$nilai = mysql_query("SELECT * FROM nilai where kd_kelas=$kode  ");
						$start=1;
						while($a = mysql_fetch_array($nilai)){
							if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"text-align:center;border:1px solid #000;\">$a[id_siswa]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[semester]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[kd_mapel]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[kkm]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[ulangan_1]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[ulangan_2]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[ulangan_3]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[mid_sem]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[uas]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[nilai_rapor]</td>
							<td style=\"text-align:center;border:1px solid #000;\">
							<a href=\"nilai-$a[id_siswa]-edit\"><img src=\"images/edit.png\"/></a> | <a href=\"nilai-$a[id_siswa]-hapus\"><img src=\"images/hapus.png\"/></a>
							</td></tr>";
							$start++;
						}
					echo "</table></form>";
					}
					?>
					<br>
					<form action="users/admin/proses/tambah.nilai.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table border="1" style="color:#000;">
							<tr class='light'>
								<th colspan='2'><center><h3>Masukan Data nilai baru</h3></center></th>
							</tr>
							<tr class='dark'>
								<td>Id Siswa(NIS)</td>
								<td><input class="input" type="text" name="id" /></td>
							</tr>
							<tr class='light'>
								<td>Tahun Ajaran</td>
								<td><input class="input" type="text" name="thn_ajaran"/></td>
							</tr>
							<tr class='dark'>
								<td>Semester</td>
								<td><input class="input" type="text" name="semester"/></td>
							</tr>
							<tr class='light'>
								<td>Kode Mapel</td>
								<td><input class="input" type="text" name="kd_mapel"/></td>
							</tr>
							<tr class='dark'>
								<td>Kode Kelas</td>
								<td><input class="input" type="text" name="kd_kelas"/></td>
							</tr>
							<tr class='light'>
								<td>KKM</td>
								<td><input class="input" type="text" name="kkm"/></td>
							</tr>
							<tr class='dark'>
								<td>Ulangan 1</td>
								<td><input class="input" type="text" name="ulangan_1"/></td>
							</tr>
							<tr class='light'>
								<td>Ulangan 2</td>
								<td><input class="input" type="text" name="ulangan_2"/></td>
							</tr>
							<tr class='dark'>
								<td>Ulangan 3</td>
								<td><input class="input" type="text" name="ulangan_3"/></td>
							</tr>
							<tr class='light'>
								<td>Mid Semester</td>
								<td><input class="input" type="text" name="mid_sem"/></td>
							</tr>
							<tr class='dark'>
								<td>Ujian Akhir Semester</td>
								<td><input class="input" type="text" name="uas"/></td>
							</tr>
							<tr class='light'>
								<td>Nilai Rapor</td>
								<td><input class="input" type="text" name="nilai_rapor"/></td>
							</tr>
							<tr class='dark'>
								<td colspan="2"><input type="submit" name="submit" align="center" value="Tambah"/></td>
							</tr>
						</table>
					</form>
					<?php
				}else if($_GET['proses']=='edit'){
					if(!isset($_GET['id_siswa'])){
						echo "<script>document.location='nilai';</script>";
					}else{
						$id= $_GET['id_siswa'];
						$nilai = mysql_query("SELECT * FROM nilai WHERE id_siswa='$id'");
						$jnilai = mysql_num_rows($nilai);
						if($jnilai == 1){
							$a = mysql_fetch_array($nilai);?>
							<form action="users/admin/proses/edit.nilai.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
							<table border="1" style="color:#000;">
							<tr class='light'>
							<th colspan='2'><center><h1>Data nilai</h1></center></th></tr>
							<tr class='dark'><td>Id Siswa(NIS)</td>
							<td><input class="input" type="text" name="id" value="<?php echo $a['id_siswa']?>"/></td>
							</tr>
							<tr class='light'><td>Tahun Ajaran</td>
							<td><input class="input" type="text" name="thn_ajaran" value="<?php echo $a['thn_ajaran']?>"/></td>
							</tr>
							<tr class='dark'><td>Semester</td>
							<td><input class="input" type="text" name="semester" value="<?php echo $a['semester']?>"/></td>
							</tr>
							<tr class='light'><td>Kode Mapel</td>
							<td><input class="input" type="text" name="kd_mapel" value="<?php echo $a['kd_mapel']?>"/></td>
							</tr>
							<tr class='light'><td>Kode Kelas</td>
							<td><input class="input" type="text" name="kd_kelas" value="<?php echo $a['kd_kelas']?>"/></td>
							</tr>
							<tr class='dark'><td>KKM</td>
							<td><input class="input" type="text" name="kkm" value="<?php echo $a['kkm']?>"/></td>
							</tr>
							<tr class='light'><td>Ulangan 1</td>
							<td><input class="input" type="text" name="ulangan_1" value="<?php echo $a['ulangan_1']?>"/></td>
							</tr>
							<tr class='dark'><td>Ulangan 2</td>
							<td><input class="input" type="text" name="ulangan_2" value="<?php echo $a['ulangan_2']?>"/></td>
							</tr>
							<tr class='light'><td>Ulangan 3</td>
							<td><input class="input" type="text" name="ulangan_3" value="<?php echo $a['ulangan_3']?>"/></td>
							</tr>
							<tr class='dark'><td>Mid Semester</td>
							<td><input class="input" type="text" name="mid_sem" value="<?php echo $a['mid_sem']?>"/></td>
							</tr>
							<tr class='light'><td>Ujian Akhir Semester</td>
							<td><input class="input" type="text" name="uas" value="<?php echo $a['uas']?>"/></td>
							</tr>
							<tr class='dark'><td>Nilai Rapor</td>
							<td><input class="input" type="text" name="nilai_rapor" value="<?php echo $a['nilai_rapor']?>"/></td>
							</tr>
							<tr class='light'>
							<td><input type="submit" value="Edit" /></td>
							</tr>
							</table></form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='nilai';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['id_siswa'])){
						echo "<script>document.location='nilai';</script>";
					}else{
						$id= addslashes($_GET['id_siswa']);
						$nilai = mysql_query("SELECT * FROM nilai WHERE id_siswa='$id'");
						$jsiswa = mysql_num_rows($nilai);
						if($jsiswa == 1){
							$delete = mysql_query("DELETE FROM nilai WHERE id_siswa='$id'");
							if($delete){
								echo "<script>alert('Data berhasil dihapus');document.location='nilai';</script>";
							}else{
								echo "<script>alert('Data gagal dihapus');document.location='nilai';</script>";
							}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='nilai';</script>";
						}
					}
				}
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'siswa')){
			$kelas = mysql_query("SELECT distinct kd_kelas FROM kelas WHERE id_siswa='$_SESSION[nama]'");
			$nilai = mysql_query("SELECT s.nm_siswa,s.id_siswa,k.kelas,n.thn_ajaran,n.semester FROM siswa s,kelas k,nilai n WHERE k.id_siswa='$_SESSION[nama]' and password='$_SESSION[pass]'");
			$n = mysql_fetch_array($nilai);
			echo "<table><tr><td>Nama <td>:</td></td><td >$n[nm_siswa]</td></tr>
			<tr><td>NIS <td>:</td></td><td>$n[id_siswa]</td></tr>
			<form method='post'>
					<tr><td>Kelas <td>:</td></td>
					<td><select name='x'>";
						while ($z = mysql_fetch_array($kelas)){
							echo"<option value=$z[kd_kelas]>$z[kd_kelas]</option>";
							$kode = $_POST['x'];}
							echo"</option></select></td>
							<td><input type=\"submit\" name=\"submit\" value=\"Lihat\"></td></tr></table>";
			?>
					<table border="1" style="color:#000;">
					<tr style="background:#ccc;">
						<th style="border:1px solid #000;">Mata Pelajaran</th>
						<th style="border:1px solid #000;">KKM</th>
						<th style="border:1px solid #000;">Ulangan 1</th>
						<th style="border:1px solid #000;">Ulangan 2</th>
						<th style="border:1px solid #000;">Ulangan 3</th>
						<th style="border:1px solid #000;">Mid Semester</th>
						<th style="border:1px solid #000;">Ujian Akhir Semester</th>
						<th style="border:1px solid #000;">Nilai Rapor</th>
						<th style="border:1px solid #000;">Semester</th>
						<th style="border:1px solid #000;">Tahun Ajaran</th>
					</tr>
					<?php
					if($kode != 0){
						$nilai = mysql_query("SELECT distinct n.*,m.nm_mapel FROM nilai n,mapel m WHERE id_siswa='$_SESSION[nama]' and n.kd_kelas=$kode ");
						$start=1;
						while($a = mysql_fetch_array($nilai)){
							if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"text-align:center;border:1px solid #000;\">$a[nm_mapel]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[kkm]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[ulangan_1]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[ulangan_2]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[ulangan_3]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[mid_sem]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[uas]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[nilai_rapor]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[semester]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[thn_ajaran]</td></tr>";
							$start++;
						}
						}
					echo "</table></form>";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'guru')){
				if(!isset($_GET['proses'])){
				$kelas = mysql_query("SELECT distinct kd_mapel FROM nilai");
					echo "<form method='post'>
					<table border=\"1\" style=\"color:#000;\">
					<tr><td colspan=2>Kelas :</td><td><select name='x'>";
						while ($z = mysql_fetch_array($kelas)){
							echo"<option value=$z[kd_mapel]>$z[kd_mapel]</option>";
							$kd = $_POST['x'];}
							echo"</option></select></td><td><input type=\"submit\" name=\"submit\" value=\"Lihat\" /></td></tr>";
							?>
					<tr style="background:#ccc;">
					<th style="border:1px solid #000;">Id Siswa (NIS)</th>
					<th style="border:1px solid #000;">Semester</th>
					<th style="border:1px solid #000;">Tahun Ajaran</th>
					<th style="border:1px solid #000;">Kode Mapel</th>
					<th style="border:1px solid #000;">KKM</th>
					<th style="border:1px solid #000;">Ulangan 1</th>
					<th style="border:1px solid #000;">Ulangan 2</th>
					<th style="border:1px solid #000;">Ulangan 3</th>
					<th style="border:1px solid #000;">Mid Semester</th>
					<th style="border:1px solid #000;">Ujian Akhir Semester</th>
					<th style="border:1px solid #000;">Nilai Rapor</th>
					<th style="border:1px solid #000;">Proses</th></tr>
					<?php
					if($kd!=0){
						$nilai = mysql_query("SELECT * FROM nilai where kd_mapel=$kd");
						$start=1;
						while($a = mysql_fetch_array($nilai)){
							if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"text-align:center;border:1px solid #000;\">$a[id_siswa]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[semester]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[thn_ajaran]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[kd_mapel]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[kkm]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[ulangan_1]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[ulangan_2]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[ulangan_3]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[mid_sem]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[uas]</td>
							<td style=\"text-align:center;border:1px solid #000;\">$a[nilai_rapor]</td>
							<td style=\"text-align:center;border:1px solid #000;\">
							<a href=\"nilai-$a[id_siswa]-edit\"><img src=\"images/edit.png\"/></a> | <a href=\"nilai-$a[id_siswa]-hapus\"><img src=\"images/hapus.png\"/></a>
							</td></tr>";
							$start++;
						}
					echo "</table></form>";
					}
					?>
					<br>
					<form action="users/admin/proses/tambah.nilai.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table border="1" style="color:#000;">
							<tr class='light'>
								<th colspan='2'><center><h3>Masukan Data nilai baru</h3></center></th>
							</tr>
							<tr class='dark'>
								<td>Id Siswa(NIS)</td>
								<td><input class="input" type="text" name="id" /></td>
							</tr>
							<tr class='light'>
								<td>Tahun Ajaran</td>
								<td><input class="input" type="text" name="thn_ajaran"/></td>
							</tr>
							<tr class='dark'>
								<td>Semester</td>
								<td><input class="input" type="text" name="semester"/></td>
							</tr>
							<tr class='light'>
								<td>Kode Mapel</td>
								<td><input class="input" type="text" name="kd_mapel"/></td>
							</tr>
							<tr class='dark'>
								<td>Kode Kelas</td>
								<td><input class="input" type="text" name="kd_kelas"/></td>
							</tr>
							<tr class='light'>
								<td>KKM</td>
								<td><input class="input" type="text" name="kkm"/></td>
							</tr>
							<tr class='dark'>
								<td>Ulangan 1</td>
								<td><input class="input" type="text" name="ulangan_1"/></td>
							</tr>
							<tr class='light'>
								<td>Ulangan 2</td>
								<td><input class="input" type="text" name="ulangan_2"/></td>
							</tr>
							<tr class='dark'>
								<td>Ulangan 3</td>
								<td><input class="input" type="text" name="ulangan_3"/></td>
							</tr>
							<tr class='light'>
								<td>Mid Semester</td>
								<td><input class="input" type="text" name="mid_sem"/></td>
							</tr>
							<tr class='dark'>
								<td>Ujian Akhir Semester</td>
								<td><input class="input" type="text" name="uas"/></td>
							</tr>
							<tr class='light'>
								<td>Nilai Rapor</td>
								<td><input class="input" type="text" name="nilai_rapor"/></td>
							</tr>
							<tr class='dark'>
								<td colspan="2"><input type="submit" name="submit" align="center" value="Tambah"/></td>
							</tr>
						</table>
					</form>
					<?php
				}else if($_GET['proses']=='edit'){
					if(!isset($_GET['id_siswa'])){
						echo "<script>document.location='nilai';</script>";
					}else{
						$id= $_GET['id_siswa'];
						$nilai = mysql_query("SELECT * FROM nilai WHERE id_siswa='$id'");
						$jnilai = mysql_num_rows($nilai);
						if($jnilai == 1){
							$a = mysql_fetch_array($nilai);?>
							<form action="users/admin/proses/edit.nilai.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
							<table border="1" style="color:#000;">
							<tr class='light'>
							<th colspan='2'><center><h1>Data nilai</h1></center></th></tr>
							<tr class='dark'><td>Id Siswa(NIS)</td>
							<td><input class="input" type="text" name="id" value="<?php echo $a['id_siswa']?>"/></td>
							</tr>
							<tr class='light'><td>Tahun Ajaran</td>
							<td><input class="input" type="text" name="thn_ajaran" value="<?php echo $a['thn_ajaran']?>"/></td>
							</tr>
							<tr class='dark'><td>Semester</td>
							<td><input class="input" type="text" name="semester" value="<?php echo $a['semester']?>"/></td>
							</tr>
							<tr class='light'><td>Kode Mapel</td>
							<td><input class="input" type="text" name="kd_mapel" value="<?php echo $a['kd_mapel']?>"/></td>
							</tr>
							<tr class='light'><td>Kode Kelas</td>
							<td><input class="input" type="text" name="kd_kelas" value="<?php echo $a['kd_kelas']?>"/></td>
							</tr>
							<tr class='dark'><td>KKM</td>
							<td><input class="input" type="text" name="kkm" value="<?php echo $a['kkm']?>"/></td>
							</tr>
							<tr class='light'><td>Ulangan 1</td>
							<td><input class="input" type="text" name="ulangan_1" value="<?php echo $a['ulangan_1']?>"/></td>
							</tr>
							<tr class='dark'><td>Ulangan 2</td>
							<td><input class="input" type="text" name="ulangan_2" value="<?php echo $a['ulangan_2']?>"/></td>
							</tr>
							<tr class='light'><td>Ulangan 3</td>
							<td><input class="input" type="text" name="ulangan_3" value="<?php echo $a['ulangan_3']?>"/></td>
							</tr>
							<tr class='dark'><td>Mid Semester</td>
							<td><input class="input" type="text" name="mid_sem" value="<?php echo $a['mid_sem']?>"/></td>
							</tr>
							<tr class='light'><td>Ujian Akhir Semester</td>
							<td><input class="input" type="text" name="uas" value="<?php echo $a['uas']?>"/></td>
							</tr>
							<tr class='dark'><td>Nilai Rapor</td>
							<td><input class="input" type="text" name="nilai_rapor" value="<?php echo $a['nilai_rapor']?>"/></td>
							</tr>
							<tr class='light'>
							<td><input type="submit" value="Edit" /></td>
							</tr>
							</table>
							</form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='nilai';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['id_siswa'])){
						echo "<script>document.location='nilai';</script>";
					}else{
						$id= addslashes($_GET['id_siswa']);
						$nilai = mysql_query("SELECT * FROM nilai WHERE id_siswa='$id'");
						$jsiswa = mysql_num_rows($nilai);
						if($jsiswa == 1){
							$delete = mysql_query("DELETE FROM nilai WHERE id_siswa='$id'");
							if($delete){
								echo "<script>alert('Data berhasil dihapus');document.location='nilai';</script>";
							}else{
								echo "<script>alert('Data gagal dihapus');document.location='nilai';</script>";
							}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='nilai';</script>";
						}
					}
				}
			}?>
    </div>
    <div class="content_box_bottom"></div>
  </div>
  <div class="cleaner"></div>
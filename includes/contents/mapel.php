<div id="content">
    <div class="content_box">
			<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				echo "Maaf, anda tidak punya izin untuk melihat menu ini.";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
				if(!isset($_GET['proses'])){
					echo "
					<table border=\"1\" style=\"color:#000;\">
					<tr>
						<th colspan=\"100%\"><center><h2>Mapel</h2></center></th>
					</tr>
					<tr style=\"background:#ccc;\">
						<th style=\"border:1px solid #000;\">Kode Mapel</th>
						<th style=\"border:1px solid #000;\">Mata Pelajaran</th>
						<th style=\"border:1px solid #000;\">Kode Kelas</th>
						<th style=\"border:1px solid #000;\">Id Guru</th>
						<th style=\"border:1px solid #000;\">Proses</th>
					</tr>";
						$Mapel = mysql_query("SELECT * FROM mapel");
						$mulai=1;
							while($m = mysql_fetch_array($Mapel)){
								if($mulai%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
								echo "<td style=\"text-align:center;border:1px solid #000;\">$m[kd_mapel]</td>
								<td style=\"border:1px solid #000;\">$m[nm_mapel]</td>
								<td style=\"text-align:center;border:1px solid #000;\">$m[kd_kelas]</td>
								<td style=\"text-align:center;border:1px solid #000;\">$m[id_guru]</td>
								<td style=\"text-align:center;border:1px solid #000;\">
							<a href=\"mapel-$m[kd_mapel]-edit\"><img src=\"images/edit.png\"/></a> | <a href=\"mapel-$m[kd_mapel]-hapus\"><img src=\"images/hapus.png\"/></a>
							</td></tr>";
								$mulai++;
							}
					echo "</table>";
				
			?>
			<form action="users/admin/proses/tambah.mapel.php" method="post">
					<style>.input{padding:4px;width:100%;}</style>
						<table border="1" style="color:#000;">
							<tr class='light'>
								<th colspan='2'><center><h3>Masukan Data Mata Pelajaran</h3></center></th>
							</tr>
							<tr class='dark'>
								<td>Kode Mapel</td>
								<td><input class="input" type="text" name="kd_mapel" /></td>
							</tr>
							<tr class='light'>
								<td>Mata Pelajaran</td>
								<td><input class="input" type="text" name="nm_mapel"/></td>
							</tr>
							<tr class='dark'>
								<td>Kode Kelas</td>
								<td><input class="input" type="text" name="kd_kelas"/></td>
							</tr>
							<tr class='light'>
								<td>Id Guru</td>
								<td><input class="input" type="text" name="id_guru"/></td>
							</tr>
							<tr>
								<td colspan="2"><input type="submit" name="submit" align="center" value="Tambah" /></td>
							</tr>
						</table>
					</form>
					<?php
				}else if($_GET['proses']=='edit'){
					if(!isset($_GET['kd_mapel'])){
						echo "<script>document.location='mapel';</script>";
					}else{
						$kd= addslashes($_GET['kd_mapel']);
						$mapel = mysql_query("SELECT * FROM mapel WHERE kd_mapel='$kd'");
						$jmapel = mysql_num_rows($mapel);
						if($jmapel == 1){
							$a = mysql_fetch_array($mapel);?>
							<form action="users/admin/proses/edit.mapel.php" method="post">
							<style>.input{padding:4px;width:100%;}</style>
							<table border="1" style="color:#000;">
							<tr class='light'><th colspan='2'><center><h1>Data mapel</h1></center></th></tr>
							<tr class='dark'><td>Kode Mapel</td>
								<td><input class="input" type="text" name="kd_mapel" value="<?php echo $a['kd_mapel']?>"/></td>
							</tr>
							<tr class='light'><td>Mata Pelajaran</td>
								<td><input class="input" type="text" name="nm_mapel" value="<?php echo $a['nm_mapel']?>"/></td>
							</tr>
							<tr class='dark'><td>Kode Kelas</td>
								<td><input class="input" type="text" name="kd_kelas" value="<?php echo $a['kd_kelas']?>"/></td>
							</tr>
							<tr class='light'><td>Id Guru</td>
								<td><input class="input" type="text" name="id_guru" value="<?php echo $a['id_guru']?>"/></td>
							</tr>
							<tr class='dark'><td><input type="submit" value="Edit" /></td>
							</tr>
							</table>
							</form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='mapel';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['kd_mapel'])){
						echo "<script>document.location='mapel';</script>";
					}else{
						$kd = $_GET['kd_mapel'];
						$mapel = mysql_query("SELECT * FROM mapel WHERE kd_mapel='$kd'");
						$jmapel = mysql_num_rows($mapel);
						if($jmapel == 1){
							$delete = mysql_query("DELETE FROM mapel WHERE kd_mapel='$kd'");
							if($delete){
								echo "<script>alert('Data berhasil dihapus');document.location='mapel';</script>";
							}else{
								echo "<script>alert('Data gagal dihapus');document.location='mapel';</script>";
								}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='mapel';</script>";
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
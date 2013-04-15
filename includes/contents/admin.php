<div id="content">
    <div class="content_box">
		<?php
			if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
				echo "Maaf, Anda tidak berhak untuk melihat menu ini.";
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
				if(!isset($_GET['proses'])){
					echo "<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th style=\"solid #000;\">
							Id admin
						</th>
						<th style=\"solid #000;\">
							Nama admin							
						</th>
						<th style=\"solid #000;\">Proses</th>
					</tr>";
						if(!isset($_GET['order'])){
							$admin = mysql_query("SELECT * FROM admin ");
						}else{
							$order = addslashes($_GET['order']);
							$sort = addslashes($_GET['sort']);
							$admin = mysql_query("SELECT * FROM admin ORDER BY $order $sort");
						}
						$start=1;
						while($a = mysql_fetch_array($admin)){
							if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"text-align:center;solid #000;\">$a[id_admin]</td>
							<td style=\"text-align:center;solid #000;\">$a[nm_admin]</td>
							<td style=\"text-align:center;solid #000;\">
							<a href=\"admin-$a[id_admin]-edit\"><img src=\"images/edit.png\"/></a> | <a href=\"admin-$a[id_admin]-hapus\"><img src=\"images/hapus.png\"/></a>
							</td></tr>";
							$start++;
						}
					echo "</table>";
					?>
					<br>
					<form action="users/admin/proses/tambah.admin.php" method="post">
						<table style="color:#000;">
							<tr>
								<th colspan='2'><center><h3>Masukan Data Admin Baru</h3></center></th>
							</tr>
							<tr class='dark'>
								<td>Id admin</td>
								<td><input class="input" type="text" name="id_admin" /></td>
							</tr>
							<tr class='light'>
								<td>Nama admin</td>
								<td><input class="input" type="text" name="nama"/></td>
							</tr>
							<td colspan="2" align="right"><input type="submit" name="submit" value="Tambah" /></td>
							</tr>
						</table>
					</form>
					<?php
				}else if($_GET['proses']=='edit'){
					if(!isset($_GET['id_admin'])){
						echo "<script>document.location='admin';</script>";
					}else{
						$id= $_GET['id_admin'];
						$admin = mysql_query("SELECT * FROM admin WHERE id_admin='$id'");
						$jadmin = mysql_num_rows($admin);
						if($jadmin == 1){
						$a = mysql_fetch_array($admin);?>
						<form action="users/admin/proses/edit.admin.php" method="post">
							<table style="color:#000;">
								<tr class='light'>
								<th colspan='2'><center><h3>Data admin</h3></center></th>
								</tr>
								<tr class='dark'>
								<td>Id admin</td>
								<td><input class='input' type="text" name="id" value="<?php echo $a['id_admin']?>"/></td>
								</tr>
								<tr class='light'>
								<td>Nama admin</td>
								<td><input class='input' type="text" name="nama" value="<?php echo $a['nm_admin']?>"/></td>
								</tr>
								<tr class='dark'>
								<td>Password</td>
								<td><input class='input' type="password" name="password" value="<?php echo $a['password']?>"/></td>
								</tr>
								<tr class='light'>
								<td></td>
								<td><input type="submit" value="Edit" /></td>
								</tr>
								</table>
							</form>
							<?php
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='admin';</script>";
						}
					}
				}else if($_GET['proses']=='hapus'){
					if(!isset($_GET['id_admin'])){
						echo "<script>document.location='admin';</script>";
					}else{
						$id= addslashes($_GET['id_admin']);
						$admin = mysql_query("SELECT * FROM admin WHERE id_admin='$id'");
						$jadmin = mysql_num_rows($admin);
						if($jadmin == 1){
							$delete = mysql_query("DELETE FROM admin WHERE id_admin='$id'");
							if($delete){
								echo "<script>alert('Data berhasil dihapus');document.location='admin';</script>";
							}else{
								echo "<script>alert('Data gagal dihapus');document.location='admin';</script>";
							}
						}else{
							echo "<script>alert('Data tidak ditemukan');document.location='admin';</script>";
						}
					}
				}
			}else if((isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])) AND ($_SESSION['sebagai'] == 'admin')){
				echo "
					<table border=\"1\" style=\"color:#000;\">
					<tr style=\"background:#ccc;\">
						<th width=\"25%\" style=\"solid #000;\">
							ID admin
						</th>
						<th width=\"25%\" style=\"solid #000;\">
							Nama admin
						</th>
					</tr>";
						if(!isset($_GET['order'])){
							$admin = mysql_query("SELECT * FROM admin ");
						}else{
							$order = addslashes($_GET['order']);
							$sort = addslashes($_GET['sort']);
							$admin = mysql_query("SELECT * FROM admin ORDER BY $order $sort");
						}
						$start=1;
						while($a = mysql_fetch_array($admin)){
							if($start%2==0){echo "<tr class=\"dark\">";}else{echo "<tr class=\"light\">";}
							echo "<td style=\"text-align:center;solid #000;\">$a[id_admin]</td>
							<td style=\"text-align:center;solid #000;\">$a[nm_admin]</td>
							</tr>";
							$start++;
						}
					echo "</table>";
			}?>
      <div class="cleaner"></div>
    </div>
    <div class="content_box_bottom"></div>
  </div>
  <div class="cleaner"></div>
	
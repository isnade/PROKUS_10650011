<?php
if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
	echo "<script>alert('Maaf, Anda belum login');document.location='';</script>";
}else{
	$sbg=$_SESSION['sebagai'];
	$user=$_SESSION['nama'];
	$pass=$_SESSION['pass'];
	$cek=mysql_query("SELECT * FROM $sbg WHERE id_$sbg ='$user' AND password='$pass'");
	$rows = mysql_num_rows($cek);
	if($rows == 1){
	?>
		<div id="content_wrapper">
		<div id="sidebar">
			<h3><center>Selamat Datang <?php $p = ucfirst($sbg); echo "$p";?></center></h3>
			<?php
				include "users/$sbg/menu$sbg.php";
			?>
			
		</div>
	<?php
	}else{
		echo "<script>alert('Maaf, data Anda tidak kami temukan');document.location='index.php';</script>";
		session_destroy();
	}
}
?>
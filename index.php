<?php
  session_start();
	include "configuration/koneksi.php";
?>
<html>
	<body>
		<?php include "includes/header.php";?>
		<?php include "includes/menu.php";?>
		<?php
		if(!isset($_SESSION['sebagai'],$_SESSION['nama'],$_SESSION['pass'])){
			include "includes/login.php";
		}else{
			include "users/in.php";
		}?>
		<?php include "functions/link.php";?>
		<?php include "includes/footer.php";?>
	</body>
</html>

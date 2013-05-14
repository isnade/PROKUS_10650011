<?php
	if(!isset($_GET['act'])){
		include "includes/contents.php";
	}else if($_GET['act']=='home'){
		include "includes/contents.php";
	}else if($_GET['act']=='nilai'){
		include "includes/contents/nilai.php";
	}else if($_GET['act']=='admin'){
		include "includes/contents/admin.php";
	}else if($_GET['act']=='siswa'){
		include "includes/contents/siswa.php";
	}else if($_GET['act']=='guru'){
		include "includes/contents/guru.php";
	}else if($_GET['act']=='jadwal'){
		include "includes/contents/jadwal.php";
	}else if($_GET['act']=='mapel'){
		include "includes/contents/mapel.php";
	}else if($_GET['act']=='kelas'){
		include "includes/contents/kelas.php";
	}else if($_GET['act']=='materi'){
		include "includes/contents/materi.php";
	}else if($_GET['act']=='upload'){
		include "includes/upload.php";
	}else if($_GET['act']=='cari'){
		include "functions/cari.php";
	}else if($_GET['act']=='presensi'){
		include "includes/contents/presensi.php";
	}else if($_GET['act']=='logout'){
		include "functions/logout.php";
	}
?>